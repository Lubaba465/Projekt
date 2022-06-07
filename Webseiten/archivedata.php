<?php
require("dao.php");
$search = (isset($_GET["search"]) && is_string($_GET["search"])) ? $_GET["search"] : "";
$allEntries;
if($search == "") {
    //no search
    global $allEntries;
    $allEntries = $dao->getAllCastles();
} else {
    //search
    global $allEntries;
    $allEntries = $dao->searchCastle($search);
}

$sort = (isset($_POST["sort"]) && is_string($_POST["sort"])) ? $_POST["sort"] : "firstletter";
$sortDirection = (isset($_POST["sortDirection"]) && is_string($_POST["sortDirection"])) ? $_POST["sortDirection"] : "asc";

$categories = array();
$entries = array("" => array());

foreach($allEntries as $entry) {
    global $categories;
    global $entries;
    if (!in_array($entry[$sort], $categories)) {
        $categories[] = $entry[$sort];
    }
    $entries[$entry[$sort]][] = $entry;
}
if ($sortDirection == "asc") {
    sort($categories, SORT_STRING);
} else {
    rsort($categories, SORT_STRING);
}
?>

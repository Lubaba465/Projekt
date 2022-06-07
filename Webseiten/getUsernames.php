<?php
// get the q parameter from URL or POST
$q = $_REQUEST["q"];
require_once("dao.php");
$allUsernames = $dao->getUsernames();
$nameTaken = "";

foreach($allUsernames as $user) {
    if (strcasecmp($q, $user["username"]) == 0) {
        $nameTaken = "Name bereits vergeben";
        echo $nameTaken;
    }
}
?>

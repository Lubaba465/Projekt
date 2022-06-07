<?php
require_once("dao.php");
$entrydata;
$buttontext;
$is_edit = false;
if((isset($_GET["id"]) && is_string($_GET["id"]))) {
    global $entrydata;
    global $buttontext;
    global $is_edit;
    $is_edit = true;
    $buttontext = "Beitrag bearbeiten";
    $entrydata = $dao->getCastle($_GET["id"]);
} else {
    global $entrydata;
    global $buttontext;
    $buttontext = "Beitrag erstellen";
    $entrydata = array(
        "id" => "",
        "name" => "", 
        "city" => "", 
        "year" => "",
        "style" => "",
        "public" => "",
        "link" => "https://",
        "description" => "",
        "autor" => "",
        "changedate" => "",
        "country" => "", 
        "commentars" => array(),
        "pictures" => array(), 
        "century" => "", 
        "firstletter" => "", 
        "longitude" => "",
        "latitude" => ""
    );
}
$is_public = ($entrydata["public"] == "Ja");
$is_not_public = ($entrydata["public"] == "Nein");
$is_not_defined = ($entrydata["public"] != "Ja" && $entrydata["public"] != "Nein");
?>

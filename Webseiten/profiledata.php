<?php
if(session_status() !== PHP_SESSION_ACTIVE){ session_start();}
require_once("dao.php");
$entrydata;
$castlesFromUser;
$type = (isset($_GET["type"])) ? $_GET["type"] : "error";
$is_info = $type  == "info";
$is_user;
if(isset($_GET["id"]) && is_string($_GET["id"])){
    global $entrydata;
    $entrydata = $dao->getUser($_GET["id"]);
    if($entrydata == "not found") {
        header("Location: ./error.php?fehler=E001");
    }
    if($_GET["id"] != $_SESSION["user_id"]) {
        global $type;
        $type = "info";
    }
    global $castlesFromUser;
    $castlesFromUser = $dao->getCastlesByUser($_GET["id"]);
} else {
    global $entrydata;
    $entrydata = array(
    "id" => null,
    "username" => "",
    "picture" => "",
    "e-mail" => "",
    "password" => "",
    "description" => ""
);
}
?>

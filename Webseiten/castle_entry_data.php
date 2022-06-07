<?php
if(session_status() !== PHP_SESSION_ACTIVE){ session_start();}
require_once("dao.php");
$type;
$id = ((isset($_POST["id"]) && is_string($_POST["id"])) ? $_POST["id"] : "null");
$name = ((isset($_POST["name"]) && is_string($_POST["name"])) ? $_POST["name"] : "null");
$city = ((isset($_POST["city"]) && is_string($_POST["city"])) ? $_POST["city"] : "null");
$country = ((isset($_POST["country"]) && is_string($_POST["country"])) ? $_POST["country"] : "null");
$year = ((isset($_POST["year"]) && is_string($_POST["year"])) ? $_POST["year"] : null);
$style = ((isset($_POST["style"]) && is_string($_POST["style"])) ? $_POST["style"] : "keine Angabe");
$public = ((isset($_POST["public"]) && is_string($_POST["public"])) ? $_POST["public"] : "keine Angabe");
$link = ((isset($_POST["link"]) && is_string($_POST["link"])) ? $_POST["link"] : "null");
$description = ((isset($_POST["description"]) && is_string($_POST["description"])) ? $_POST["description"] : null);
$longitude = ((isset($_POST["longitude"]) && is_string($_POST["longitude"])) ? $_POST["longitude"] : 0.0);
$latitude = ((isset($_POST["latitude"]) && is_string($_POST["latitude"])) ? $_POST["latitude"] : 0.0);
if(isset($_POST["delete"])) {
    global $type;
    $type = "delete";
    $dao->deleteCastle($id);
} elseif(isset($_POST["create"])) {
    $castle = array(":name" => htmlentities($name), ":city" => htmlentities($city), ":country" => htmlentities($country), ":year" => htmlentities($year), ":style" => htmlentities($style), ":public" => htmlentities($public), ":link" => htmlentities($link), ":description" => htmlentities($description), ":longitude" => htmlentities($longitude), ":latitude" => htmlentities($latitude));

    $castle[":firstletter"] = substr(ltrim(str_replace(array("Burg", "Schloss", "Festung"), "", htmlentities($name))), 0, 1);
    $year_as_int = intval($year);
    $castle[":century"] = strval((intval($year_as_int / 100)) + 1) . ". Jahrhundert";
    $castle[":author_id"] = $_SESSION["user_id"];
    $castle[":change_date"] = date("j.n.Y H:i:s");
    if($_POST["create"] == "Beitrag bearbeiten") {
        global $type;
        $type = "edit";
        $dao->updateCastle($id, $castle);
    } else {
        //Beitrag erstellen
        global $type;
        $type = "create";
        $castle[":creation_date"] = date("Y.m.d H:i:s");
        $dao->saveCastle($castle);
    }
} else {
    //fehler
}
?>

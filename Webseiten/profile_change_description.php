<?php
require_once("dao.php");
$description = ((isset($_POST["description"]) && is_string($_POST["description"])) ? htmlentities($_POST["description"]) : "");
$id = (isset($_POST["id"]) ? $_POST["id"] : 0);
if(isset($_POST['changeDescription'])){
    $dao->updateUserDescription($id, $description);
    echo "Die Beschreibung wurde verändert!";
    header("Location: ./profile.php?type=info&id=" . $id);
}else{
    header("Location: ./error.php?fehler=E012");
}


?>

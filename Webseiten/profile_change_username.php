<?php
require_once("dao.php");
$username = ((isset($_POST["username"]) && is_string($_POST["username"])) ? htmlentities($_POST["username"]) : "");
$id = (isset($_POST["id"]) ? $_POST["id"] : 0);
if(isset($_POST['changeName'])){
    $dao->updateUserName($id, $username);
    echo "Der Name wurde geändert!";
    header("Location: ./profile.php?type=info&id=" . $id);
}else{
    header("Location: ./error.php?fehler=E017");
}
?>

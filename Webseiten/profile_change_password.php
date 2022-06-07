<?php 
require_once("dao.php");
$old_password = ((isset($_POST["old_password"]) && is_string($_POST["old_password"])) ? htmlentities($_POST["old_password"]) : "");
$new_password = ((isset($_POST["new_password"]) && is_string($_POST["new_password"])) ? htmlentities($_POST["new_password"]) : "");
$re_new_password = ((isset($_POST["re_new_password"]) && is_string($_POST["re_new_password"])) ? htmlentities($_POST["re_new_password"]) : "");
$id = (isset($_POST["id"]) ? $_POST["id"] : 0);
if(isset($_POST['btnreset'])){
    $user = $dao->getUser($id);
    if(password_verify($old_password, $user["password"])) {
        if ($new_password == $re_new_password) {
            $dao->updateUserPassword($id, password_hash($new_password, PASSWORD_DEFAULT));
            echo "Passwort geändert";
            header("Location: ./profile.php?type=info&id=" . $id);
        } else {
            header("Location: ./error.php?fehler=E016");
        }
    } else {
        header("Location: ./error.php?fehler=E019");
    }
}
?>

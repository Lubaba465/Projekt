<?php
    require_once("dao.php");
    if(isset($_POST['btnlogin'])){
        session_destroy();
        session_start();
        
        $user = $dao->getUserByUsername(htmlentities($_POST['username']));
        $_SESSION['username'] = isset($user["username"]) ? $user["username"] : "";
        if(password_verify(htmlentities($_POST["password"]), $user["password"])) {
            $_SESSION['name'] = $user["username"]; 
            $_SESSION['user_id'] = $user["id"];
            $_SESSION['login'] = true;
            header('Location: login_get.php');
        } else {
            session_destroy();
            header("Location: ./error.php?fehler=E027");
        }
        
        
    }

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <legend>Anmeldung</legend>
        <label for="username">Nutzername:</label><br>
        <input type="text" , name="username" , required="required" autocomplete="off"><br>
        <label for="password">Passwort:</label><br>
        <input type="password" , name="password" , required="required"><br>
        <a class="nodec red" href="forgotpass.php">Passwort vergessen?</a><br>
        <input type="submit" name="btnlogin" value="Einloggen" class="button">
    </fieldset>
</form>

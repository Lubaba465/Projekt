<?php 
require_once("dao.php");
if(isset($_POST['btnregister'])){
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];
   
    if($password != $rePassword){
        header("Location: ./error.php?fehler=E016");
    } else {
        $password = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);
        $answer = password_hash(htmlentities($_POST["answer"]), PASSWORD_DEFAULT);
        $user = array(":username" => htmlentities($_POST["username"]), ":password" => $password, ":question" => htmlentities($_POST["question"]), ":answer" => $answer);
        $dao->saveUser($user);
    }
    
    
}

?>

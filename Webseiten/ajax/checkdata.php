<?php

try{
    $user = "root";
$pw = null;
//$dsn = "mysql:dbname=PHP-PDO;host=localhost";
$dsn= "sqlite:./datenbank.db";
$db = new PDO($dsn, $user, $pw);
    $password = strval(password_hash("12345", PASSWORD_DEFAULT));

mysql_select_db('demo');

if(isset($_POST['lastname']))
{
 $name=$_POST['lastname'];

 $checkdata=" SELECT name FROM users WHERE lastname='$lastname' ";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "lastname Already Exist";
 }
 else
 {
  echo "OK";
 }
 exit();
}

if(isset($_POST['email']))
{
 $email =$_POST['email'];

 $checkdata=" SELECT email FROM users WHERE email='$email' ";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "Email Already Exist";
 }
 else
 {
  echo "OK";
 }
 exit();
}
    
    $err = $db->errorInfo();
echo strval($err[0]);
$db = null;
}catch(PDOException $e) {
    echo $e->getMessage();
} finally {
    
}
?>
<?php
$user = "root";
$pw = null;
//$dsn = "mysql:dbname=PHP-PDO;host=localhost";
$dsn= "sqlite:./datenbank.db";
$db = new PDO($dsn, $user, $pw);
foreach ($db->query("SELECT * FROM castles;") as $row) {
    print_r($row);
};
?>
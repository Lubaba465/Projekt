<?php

try {
    $user = "root";
    $pw = null;
    //$dsn = "mysql:dbname=PHP-PDO;host=localhost";
    $dsn= "sqlite:./datenbank.db";
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql1 = "DROP TABLE IF EXISTS pictures;
    DROP TABLE IF EXISTS comments;
    DROP TABLE IF EXISTS castles;
    DROP TABLE IF EXISTS users;
    DROP TABLE IF EXISTS securityquestions;
    CREATE TABLE castles (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(50) NOT NULL,
	change_date DATE NOT NULL,
	year INTEGER,
    style VARCHAR(30),
    public VARCHAR(5),   
    link VARCHAR(50),
	description TEXT NOT NULL,
    century VARCHAR(30),
    longitude REAL NOT NULL,
    latitude REAL NOT NULL,
    creation_date VARCHAR(50) NOT NULL,
    firstletter CHAR(1) NOT NULL,
    country VARCHAR(50),
	city VARCHAR(50),
    author_id VARCHAR(255) NOT NULL,
    FOREIGN KEY(author_id) REFERENCES users(id)
    );
    CREATE TABLE pictures (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
	path VARCHAR(50),
	castle_id INTEGER NOT NULL,
 	FOREIGN KEY(castle_id) REFERENCES castles(id)
    );
    CREATE TABLE comments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
	content TEXT NOT NULL,
	time DATE NOT NULL,
	author VARCHAR(50) NOT NULL,
    castle_id INTEGER,
	FOREIGN KEY(castle_id) REFERENCES castles(id)
    );
    CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(50),
	password VARCHAR(255) NOT NULL,
	picturepath VARCHAR(50),
	description TEXT,
    question VARCHAR(50), 
    answer VARCHAR(50)
    );";
    $db->exec($sql1);
    $err = $db->errorInfo();
    echo strval($err[0]);
    echo "<br>";
    include("insert_data.php");
    
} catch (PDOException $e) {echo $e->getMessage();}
$db = null;    
?>

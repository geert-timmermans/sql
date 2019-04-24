<?php
//connect to sql database with pdo
$host = 'localhost';
$db   = 'colyseum';
$user = 'root';
$pass = 'geert';
$charset = 'utf8';


try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo 'Connected';
} catch (PDOException $e) {
    echo 'Connection failed: ' .$e->getMessage();
}


?>
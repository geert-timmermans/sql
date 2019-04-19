<?php

$host = 'localhost';
$db_name = 'reunion_island';
$user = 'root';
$psw = 'geert';
$charset = 'utf8';


    try {
        $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
        $pdo = new PDO($dsn, $user, $psw);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo 'Connected';
    } catch (PDOException $error) {
        echo 'Connection failed: ' . $error->getMessage();
    }

?>
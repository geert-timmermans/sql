<?php
$host = 'localhost';
$dbname = 'weatherapp';
$username = 'root';
$password = 'geert';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Connection failed: ' .$e->getMessage();
}
?>
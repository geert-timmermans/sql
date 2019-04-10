<?php
$host = 'localhost';
$dbname = 'weatherapp';
$username = 'geert';
$password = 'geert';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $sql = 'SELECT * FROM weather';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>
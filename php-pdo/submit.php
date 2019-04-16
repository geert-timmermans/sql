<?php
include 'index.php';

if(isset($_POST['submit'])) {
    $city = $_POST['city'];
    $high = $_POST['high'];
    $low = $_POST['low'];

    $sqlinsert = "INSERT INTO weather (city, high, low) VALUES (:city, :high, :low)";

    $stmt = $pdo->prepare($sqlinsert);

    if (!$stmt) {
        echo "\nPDO::errorInfo():\n";
        print_r($pdo->errorInfo());
    } else {
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':high', $high);
        $stmt->bindParam(':low', $low);
    }
    if (!$stmt->execute()) {
        die('error inserting new record');
    } else {
        echo 'Hike has been added';
    }
}

if(isset($_POST['deleteBtn'])){
    $deleteCity = $_POST['delete'];

    $sqlDelete = "DELETE FROM weather WHERE city = '$deleteCity'";
}

?>

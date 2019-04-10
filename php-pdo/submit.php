<?php
include 'index.php';

if(isset($_POST['submit'])){
    $city = $_POST['city'];
    $high = $_POST['high'];
    $low = $_POST['low'];

    $con = mysqli_connect($host, $username, $password, $dbname);
    $input = "INSERT INTO weather (city, high, low) VALUES ('$city', '$high', '$low');";
    mysqli_query($con, $input);
}

if(isset($_POST['deleteBtn'])){
    $deleteCity = $_POST['delete'];

    $con = mysqli_connect($host, $username, $password, $dbname);
    $delete = "DELETE FROM weather WHERE city = '$deleteCity'";
    mysqli_query($con, $delete);
}

?>

<?php

include 'connect-mysql.php';

if (isset($_POST['send'])) {

    $hike_name = $_POST['hike_name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    $sqlinsert = "INSERT INTO hiking (hike_name, difficulty, distance, duration, height_difference) VALUES (:hike_name, :difficulty, :distance, :duration, :height_difference)";

    $stmt = $pdo->prepare($sqlinsert);

    if (!$stmt) {
        echo "\nPDO::errorInfo():\n";
        print_r($pdo->errorInfo());
    }
    else {
        $stmt->bindParam(':hike_name', $hike_name);
        $stmt->bindParam(':difficulty', $difficulty);
        $stmt->bindParam(':distance', $distance);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':height_difference', $height_difference);
    }

//    $stmt->execute();

//    echo 'Hike has been added';
//    header('Location: read.php');

    if (!$stmt->execute()) {
        die('error inserting new record');
    }
    else {
        header('Location: read.php?create');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add a hike</title>
    <link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<h1>Add a hike</h1>
<form action="" method="post">
    <div>
        <label for="hike_name">Name</label>
        <input type="text" name="hike_name" id="hike_name" value="">
    </div>

    <div>
        <label for="difficulty">Difficulty</label>
        <select name="difficulty" id="difficulty">
            <option value="very easy">Very easy</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
            <option value="very hard">very hard</option>
        </select>
    </div>

    <div>
        <label for="distance">Distance (km)</label>
        <input type="text" id="distance" name="distance" value="" placeholder="ex. 12.34">
    </div>
    <div>
        <label for="duration">Duration (hours)</label>
        <input type="text" id="duration" name="duration" value="" placeholder="ex. 09:00">
    </div>
    <div>
        <label for="height_difference">Height difference (m)</label>
        <input type="text" name="height_difference" id="height_difference" value="" placeholder="ex. 123">
    </div>
    <button type="submit" id="btn-create-send" name="send">Send</button>
    <button type="submit" class="btn-back" name="button"><a href="read.php" class="a-btn">Back</a></button>

</form>
</body>
</html>
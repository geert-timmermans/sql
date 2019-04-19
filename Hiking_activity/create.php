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
        $stmt->bindValue(':distance', $distance);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindValue(':height_difference', $height_difference);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<h1>Add a hike</h1>
<div class="container w-75 bgc-container py-4">
    <form action="" method="post">
        <div class="row">
            <div class="form-group col-12">
                <label for="hike_name">Name</label>
                <input type="text" name="hike_name" class="form-control" id="hike_name" value="">
            </div>

            <div class="form-group col-12">
                <label for="difficulty">Difficulty</label>
                <select name="difficulty" class="form-control" id="difficulty">
                    <option value="very easy">Very easy</option>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                    <option value="very hard">very hard</option>
                </select>
            </div>

            <div class="col-4">
                <label for="distance">Distance (km)</label>
                <input type="text" id="distance" class="form-control" name="distance" value="" placeholder="ex. 12.34">
            </div>
            <div class="col-4">
                <label for="duration">Duration (hours)</label>
                <input type="text" id="duration" class="form-control" name="duration" value="" placeholder="ex. 09:00">
            </div>
            <div class="col-4">
                <label for="height_difference">Height difference (m)</label>
                <input type="text" name="height_difference" class="form-control" id="height_difference" value="" placeholder="ex. 123">
            </div>
            <button type="submit" class="col-2 offset-3 mt-5 btn btn-outline-secondary" id="btn-create-send" name="send">Send</button>
            <a href="read.php" class="col-2 offset-2 mt-5 btn btn-outline-secondary">Back</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
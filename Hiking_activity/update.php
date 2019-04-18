<?php
include 'connect-mysql.php';

    $id = $_GET['id'];
    $sqlinsert = 'SELECT * FROM hiking WHERE id= :id';
    $stmt = $pdo->prepare($sqlinsert);
    $stmt->execute([':id'=>$id]);

    foreach ($stmt as $row) {
        $hike_name = $row['hike_name'];
        $difficulty = $row['difficulty'];
        $distance = $row['distance'];
        $duration = $row['duration'];
        $height_difference = $row['height_difference'];
    }

if (isset($_POST['send'])) {

    $hike_name2 = $_POST['hike_name'];
    $difficulty2 = $_POST['difficulty'];
    $distance2 = $_POST['distance'];
    $duration2 = $_POST['duration'];
    $height_difference2 = $_POST['height_difference'];

    $sqlUpdate = "UPDATE hiking SET  hike_name=:hike_name2, difficulty=:difficulty2, distance=:distance2, duration=:duration2, height_difference=:height_difference2 WHERE id=:id";
    $stmt = $pdo->prepare($sqlUpdate);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':hike_name2', $hike_name2);
    $stmt->bindParam(':difficulty2', $difficulty2);
    $stmt->bindParam(':distance2', $distance2);
    $stmt->bindParam(':duration2', $duration2);
    $stmt->bindParam(':height_difference2', $height_difference2);

    if(!$stmt->execute()){
        die('error inserting new record');
    }
    else{
        header('Location: read.php?update');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update a hike</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<h1>Update</h1>
    <div class="container w-75 bgc-container py-4">
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-12">
                    <label for="hike_name">Hike name</label>
                    <input type="text" name="hike_name" id="hike_name" class="form-control" value="<?php echo $hike_name ?>">
                </div>

                <div class="form-group col-12">
                    <label for="difficulty">Difficulty</label>
                    <select name="difficulty" class="form-control" id="difficulty">
                        <option value="very easy" <?php if($difficulty == 'very easy'){echo 'selected';}?>>Very easy</option>
                        <option value="easy" <?php if($difficulty == 'easy'){echo 'selected';}?>>Easy</option>
                        <option value="medium" <?php if($difficulty == 'medium'){echo 'selected';}?>>Medium</option>
                        <option value="hard" <?php if($difficulty == 'hard'){echo 'selected';}?>>Hard</option>
                        <option value="very hard" <?php if($difficulty == 'very hard'){echo 'selected';}?>>Very hard</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="distance">Distance (km)</label>
                    <input type="text" id="distance" class="form-control" name="distance" value="<?php echo $distance ?>" placeholder="ex. 12.34">
                </div>
                <div class="col-4">
                    <label for="duration">Duration (hours)</label>
                    <input type="text" id="duration" class="form-control" name="duration" value="<?php echo $duration ?>" placeholder="ex. 09:00">
                </div>
                <div class="col-4">
                    <label for="height_difference">Height difference (m)</label>
                    <input type="text" name="height_difference" class="form-control" id="height_difference" value="<?php echo $height_difference ?>" placeholder="ex. 123">
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
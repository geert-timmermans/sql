<?php
include 'connect-mysql.php';

    $id = $_GET['id'];
    $sqlinsert = 'SELECT * FROM hiking WHERE id= :id';
    $stmt = $pdo->prepare($sqlinsert);
    $stmt->execute([':id'=>$id]);

    foreach ($stmt as $row) {
        $id = $row['id'];
        $hike_name = $row['hike_name'];
        $difficulty = $row['difficulty'];
        $distance = $row['distance'];
        $duration = $row['duration'];
        $height_difference = $row['height_difference'];
    }

if (isset($_POST['send'])) {

    $hike_name2 = PDO::quote($_POST["hike_name"]);
    $difficulty2 = $_POST['difficulty'];
    $distance2 = $_POST['distance'];
    $duration2 = $_POST['duration'];
    $height_difference2 = $_POST['height_difference'];

    $sqlupdate = "UPDATE hiking SET  hike_name='$hike_name2', difficulty='$difficulty2', distance='$distance2', duration='$duration2', height_difference='$height_difference2' WHERE id='$id'";
    $stmt = $pdo->prepare($sqlupdate);

    if (!$stmt) {
        echo "\nPDO::errorInfo():\n";
        print_r($pdo->errorInfo());
        die();
    }

    if (!$stmt->execute()) {
        die('error inserting new record');
    }
    else {
        header('Location: read.php?update');
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update a hike</title>
	<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<h1>Update</h1>
	<form action="" method="post">
		<div>
			<label for="hike_name">Hike name</label>
			<input type="text" name="hike_name" id="hike_name" value="<?php echo $hike_name ?>">
		</div>

        <div>
            <label for="difficulty">Difficulty</label>
            <select name="difficulty" id="difficulty">
                <option value="very easy" <?php if($difficulty == 'very easy'){echo 'selected';}?>>Very easy</option>
                <option value="easy" <?php if($difficulty == 'easy'){echo 'selected';}?>>Easy</option>
                <option value="medium" <?php if($difficulty == 'medium'){echo 'selected';}?>>Medium</option>
                <option value="hard" <?php if($difficulty == 'hard'){echo 'selected';}?>>Hard</option>
                <option value="very hard" <?php if($difficulty == 'very hard'){echo 'selected';}?>>Very hard</option>
            </select>
        </div>
        <div>
            <label for="distance">Distance (km)</label>
            <input type="text" id="distance" name="distance" value="<?php echo $distance ?>" placeholder="ex. 12.34">
        </div>
        <div>
            <label for="duration">Duration (hours)</label>
            <input type="text" id="duration" name="duration" value="<?php echo $duration ?>" placeholder="ex. 09:00">
        </div>
        <div>
            <label for="height_difference">Height difference (m)</label>
            <input type="text" name="height_difference" id="height_difference" value="<?php echo $height_difference ?>" placeholder="ex. 123">
        </div>
        <button type="submit" id="btn-create-send" name="send">Send</button>
        <button type="submit" class="btn-back" name="button"><a href="read.php" class="a-btn">Back</a></button>
	</form>
</body>
</html>
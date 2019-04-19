<?php
include 'connect.php';

$city = $_GET['city'];
$sqlinsert = 'SELECT * FROM weather WHERE city= :city';
$stmt = $pdo->prepare($sqlinsert);
$stmt->execute([':city'=>$city]);

foreach ($stmt as $row) {
    $city = $row['city'];
    $high = $row['high'];
    $low = $row['low'];
}

if (isset($_POST['submit'])) {

    $updateCity = $_POST['city'];
    $updateHigh = $_POST['high'];
    $updateLow = $_POST['low'];

    $sqlUpdate = "UPDATE weather SET  city=:updateCity, high=:updateHigh, low=:updateLow WHERE city=:city";
    $stmt = $pdo->prepare($sqlUpdate);

    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':updateCity', $updateCity);
    $stmt->bindValue(':updateHigh', $updateHigh, PDO::PARAM_INT);
    $stmt->bindValue(':updateLow', $updateLow, PDO::PARAM_INT);

    $stmt->execute();
    header('Location: index.php?update');

//    if (!$stmt->execute()) {
//        die('error inserting new record');
//    } else {
//        header('Location: index.php?update');
//    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <h1 class="text-center my-4">Update</h1>
    <div class="row">
        <form action="" method="POST" class="col-10 offset-1 container">
            <div class="row">
                <div class="col-3">
                    <label for="city">City</label><br>
                    <input type="text" name="city" value="<?php echo $city ?>">
                </div>
                <div class="col-3">
                    <label for="high">High</label><br>
                    <input type="number" name="high" value="<?php echo $high ?>">
                </div>
                <div class="col-3">
                    <label for="low">Low</label><br>
                    <input type="number" name="low" value="<?php echo $low ?>">
                </div>
                <div class="col-3 mt-4">
                    <input type="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
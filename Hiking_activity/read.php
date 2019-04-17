<?php
//include connection to database
include 'connect-mysql.php';

$stmt = $pdo->query('SELECT * FROM hiking');

if(isset($_GET['create'])){
    $createMessage = 'Hike has been added';
}
if(isset($_GET['update'])){
    $createMessage = 'Hike has been updated';
}
if(isset($_GET['delete'])){
    $createMessage = 'Hike has been deleted';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hiking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="alert alert-dark text-center alert-dismissible w-25 mx-auto" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $createMessage?>
</div>
<h1>List of hikes</h1>
<table class="table table-bordered table-hover table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Difficulty</th>
        <th scope="col">Distance (km)</th>
        <th scope="col">Duration (hours)</th>
        <th scope="col">Height difference (m)</th>
    </tr>
    <tbody>
        <?php while ($row = $stmt->fetch()){?>

        <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['hike_name']; ?></td>
            <td class="text-center"><?php echo $row['difficulty']; ?></td>
            <td class="text-center"><?php echo $row['distance']; ?></td>
            <td class="text-center"><?php echo $row['duration']; ?></td>
            <td class="table-border-right text-center"><?php echo $row['height_difference']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-outline-info">Update</button></a>
                <a href="delete.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-outline-danger ml-1" name="deleteBtn">Delete</button></a>
            </td>

        </tr>

        <?php } ?>
    </tbody>
</table>
    <form action="create.php" class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-dark">Add Hike</button>
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
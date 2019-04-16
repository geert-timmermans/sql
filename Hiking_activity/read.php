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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hiking</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div id="update-message">
    <?php echo $createMessage?>
</div>
<h1>List of hikes</h1>
<table>
    <tr id="bgc-thead">
        <th>#</th>
        <th>Name</th>
        <th>Difficulty</th>
        <th>Distance (km)</th>
        <th>Duration (hours)</th>
        <th>Height difference (m)</th>
    </tr>
    <tbody>
        <?php while ($row = $stmt->fetch()){?>

        <tr>
            <td class="table-border-left"><?php echo $row['id']; ?></td>
            <td><?php echo $row['hike_name']; ?></td>
            <td><?php echo $row['difficulty']; ?></td>
            <td><?php echo $row['distance']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td class="table-border-right"><?php echo $row['height_difference']; ?></td>
            <td><a href="update.php?id=<?php echo $row['id']?>" class="update-link" id="update">Update</a></td>
        </tr>

        <?php } ?>
    </tbody>
</table>
    <form action="create.php" class="buttons">
        <input type="submit" id="btn-add" value="Add Hike">
    </form>
</body>
</html>
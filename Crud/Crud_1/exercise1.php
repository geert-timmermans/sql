<?php
include 'connect.php';

$stmt = $pdo->query('SELECT * FROM clients');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
    <a href="index.html" class="btn btn-danger my-3 col-2">Back</a>
    <h1 class="border">All Customers</h1>
    <table class="table table-dark">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch()){?>
        <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

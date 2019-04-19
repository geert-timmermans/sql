<?php
include 'connect.php';
$sql = 'SELECT * FROM weather';

$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);

if(isset($_GET['create'])){
    $createMessage = 'City has been added';
}
if(isset($_GET['delete'])){
    $createMessage = 'City has been deleted';
}
if(isset($_GET['update'])){
    $createMessage = 'City has been updated';
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
<div class="alert alert-dark text-center alert-dismissible w-25 mx-auto" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $createMessage;?>
</div>
<div class="container-fluid">
    <h1 class="text-center my-4">Weather</h1>
    <div class="row">
        <form action="submit.php" method="POST" class="col-10 offset-1 container">
            <div class="row">
                <div class="col-3">
                    <label for="city">City</label><br>
                    <input type="text" name="city">
                </div>
                <div class="col-3">
                    <label for="high">High</label><br>
                    <input type="number" name="high">
                </div>
                <div class="col-3">
                    <label for="low">Low</label><br>
                    <input type="number" name="low">
                </div>
                <div class="col-3 mt-4">
                    <input type="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    <br>
    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th class="w-25"></th>
            <th>City</th>
            <th>High</th>
            <th>Low</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $q->fetch()): ?>
            <tr>
                <td class="d-flex justify-content-center">
                    <a href="update.php?city=<?php echo $row['city']?>" class="btn btn-outline-success">Update</a>
                    <a href="delete.php?city=<?php echo $row['city']?>" class="btn btn-outline-danger ml-3">Delete</a></td>
                <td><?php echo htmlspecialchars($row['city']) ?></td>
                <td><?php echo htmlspecialchars($row['high']); ?></td>
                <td><?php echo htmlspecialchars($row['low']); ?></td>

            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

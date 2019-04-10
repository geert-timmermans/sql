<?php
$host = 'localhost';
$dbname = 'weatherapp';
$username = 'geert';
$password = 'geert';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $sql = 'SELECT * FROM weather';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
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
</head>
<body>
<div id="container">
    <h1>Weather</h1>
    <form action="submit.php" method="POST">
        <label for="city">City</label><br>
        <input type="text" name="city"><br><br>
        <label for="high">High</label><br>
        <input type="number" name="high"><br><br>
        <label for="low">Low</label><br>
        <input type="number" name="low"><br><br>
        <input type="submit" name="submit">
    </form>
    <br>
    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th>City</th>
            <th>High</th>
            <th>Low</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $q->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['city']) ?></td>
                <td><?php echo htmlspecialchars($row['high']); ?></td>
                <td><?php echo htmlspecialchars($row['low']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <form action="submit.php" method="POST">
        <br><h2>Delete</h2>
        <label for="delete">City</label><br>
        <input type="text" name="delete"><br><br>
        <input type="submit" name="deleteBtn">
    </form>
</div>
</body>
</html>
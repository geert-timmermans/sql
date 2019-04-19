<?php

include 'connect-mysql.php';
//select all rows from people
$sqlget = "SELECT * FROM people";
//connect and select with mysqli_query
$sqldata = mysqli_query($dbcon, $sqlget) or die('error getting data');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display data from DB</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<h1>Display Data from DB</h1>

<?php

//create html table
echo '<table>';
//create html table rows and headers
echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>';

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
    echo '<tr><td>';
    echo $row['peopleid'];
    echo '</td><td>';
    echo $row['firstname'];
    echo '</td><td>';
    echo $row['lastname'];
    echo '</td>';
}
echo '</table>';
?>

</body>
</html>

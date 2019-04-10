<?php

//if statement checks if the submitted field is posted, this only happens if someone hits the submit button
//isset checks if the fields are filled
if (isset($_POST['submitted'])){
    include('connect-mysql.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sqlinsert = "INSERT INTO people (firstname, lastname) VALUES ('$fname', '$lname')";

    //if statement for checking if the insert is true or false.
    //when false, give error message
    if (!mysqli_query($dbcon, $sqlinsert)){
        die('error inserting new record');
    } else{ //header = build in function => redirects to other location
        header('Location: display-data.php');
    }
    $newrecord = '1 record added to the database';

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert data into DB</title>
</head>
<body>

<h1>Insert Data into DB</h1>

<form action="insert-data.php" method="post">
    <input type="hidden" name="submitted" value="true">
    <fieldset>
        <legend>New People</legend>
        <label>First Name: <input type="text" name="fname"></label>
        <label>Last Name: <input type="text" name="lname"></label>
    </fieldset>
    <br>
    <input type="submit" value="add new person">
</form>
<br>
<?php
echo $newrecord;

?>


</body>
</html>
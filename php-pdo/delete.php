<?php
include 'connect.php';

if(isset($_GET['city'])){
    $city = $_GET['city'];
    $sqldelete = "DELETE FROM weather WHERE city=:city";
    $stmtdelete = $pdo->prepare($sqldelete);

    $stmtdelete->bindParam(':city', $city);

    $stmtdelete->execute();
    header('Location: form.php?delete');
}

?>
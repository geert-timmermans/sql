<?php
// Delete a hike
include 'connect-mysql.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqldelete = "DELETE FROM hiking WHERE id=:id";
    $stmtdelete = $pdo->prepare($sqldelete);

    $stmtdelete->bindParam(':id', $id);

    $stmtdelete->execute();
    header('Location: read.php?delete');
}
?>


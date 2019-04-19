<?php

session_start();
if(isset($_SESSION['username'])){
    echo '<h3>Login Success. Welcome '.$_SESSION['username'].'</h3>';
    echo '<br><br><a href="logout.php">logout</a>';
}
else{
    header('location: index.php');
}

?>
<?php

session_start();
//connection to database
include 'connect.php';

//Check if credentials are valid

if(isset($_POST['login'])) {
    if(empty($_POST['username']) || empty($_POST['password'])){
        $message = '<label>All fields are required</label>';
        $_SESSION['error'] = $message;
        header('location: index.php?error');
    }
    else{
        $query = 'SELECT * FROM users WHERE username=:username AND password=:password';
        $stmt = $pdo->prepare($query);
        $exe = ['username'=>$_POST['username'], 'password'=>sha1($_POST['password'])];
        $stmt->execute($exe);

        $count = $stmt->rowCount();
        if($count > 0){
            $_SESSION['username'] = $_POST['username'];
            header('location: login_success.php');
        }
        else{
            $message = '<label>Wrong data</label>';
            $_SESSION['wrongData'] = $message;
            header('location: index.php?wrong');
        }
    }
}
else {
    session_destroy();
    header('location: form.php');
}



?>

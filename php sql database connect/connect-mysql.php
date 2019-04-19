<?php

//constants created for storing db info
define('DB_USER','root');
define('DB_PSWD','geert');
define('DB_HOST','localhost');
define('DB_NAME','testdb');

//connection to sql db
$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

//messages only displayed for testing purposes
    //if statement, if connection to db is false, display error
    /*if (!$dbcon){
        die('error connecting to database');
    }*/

    //display successfully if connection is true
    /*echo 'You have connected successfully'*/

?>
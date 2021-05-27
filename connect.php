<?php

//Variables for database connection
$host = "localhost";
$user = "root"; //name of the DB user
$password = ""; //password of the DB user
$database = "destinationdb"; //database name

//Connecting to database
$dbConn = mysqli_connect($host, $user, $password, $database);

//Error management
if($dbConn->connect_errno) {
    echo "Failed to connect to database:" . $dbConn->connect_error;
};

//Session hijacking protection
if(isset($_SESSION["UserIP"])) {
    //Checking if session isn't hijacked
    if($_SESSION["UserIP"] !== $_SERVER['REMOTE_ADDR']) {
        //If session is hijacked, destroy it
        session_unset();
        session_destroy();
        //Start new session
        session_start();
    };
};

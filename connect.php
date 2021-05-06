<?php

//Variables for database connection
$host = "localhost";
$user = "root"; //name of the DB user
$password = ""; //password of the DB user
$database = "destinationDB"; //database name

//Connecting to database
$dbConn = mysqli_connect($host, $user, $password, $database);

//Error management
if($dbConn->connect_errno) {
    echo "Failed to connect to database:" . $dbConn->connect_error;
};
//echo "Connected successfully"; 

?>
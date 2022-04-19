<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filestorage";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection

if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);
}

// echo "Database Connection Successfull";
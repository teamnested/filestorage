<?php session_start();
require_once  '../config/connection.php';

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

$otp = rand(100000,999999);

$sql = "INSERT INTO users(first_name, last_name, email, password, otp) values ('$firstName', '$lastName', '$email', '$password', '$otp')";
 $query = mysqli_query($conn, $sql);

 if ($query){
    $_SESSION['email'] = $email;

    header('Location: ../auth/auth-confirm-otp.php');
 }

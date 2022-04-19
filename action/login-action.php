<?php

session_start();
require_once '../config/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$query = mysqli_query($conn, $sql);

$count = mysqli_num_rows($query);

if ($count) {
    $result = mysqli_fetch_array($query);

    $useremail = $result['email'];
    $userpassword = $result['password'];

    if ($userpassword == $password) {
        $_SESSION['id'] = $result['id'];
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['last_name'] = $result['last_name'];

        //  header('Location: ../index.php');
    } else {
        $_SESSION['message'] = "Invalid credentials !";
        header('Location: ../auth/auth-sign-in.php');
    }
} else {
    $_SESSION['message'] = "Invalid credentials !";
    header('Location: ../auth/auth-sign-in.php');
}

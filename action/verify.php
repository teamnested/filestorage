<?php
session_start();
require_once '../config/connection.php';

if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM users WHERE otp = '$otp'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count) {
        $result = mysqli_fetch_array($query);
        $_SESSION['is_authenticated'] = true;
        $_SESSION['is_verified'] = $result['is_verified'];
        $_SESSION['id'] = $result['id'];
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['last_name'] = $result['last_name'];

        header('Location: ' . BASE_URL . 'dashboard.php');
    } else {
        $_SESSION['message'] = "Invalid OTP !";
        header('Location: ' . BASE_URL . 'auth/login');
    }
} else {
    $email = $_GET['email'];
    $hash = $_GET['hash'];

    $sql = "SELECT * FROM users WHERE email='$email' AND hash='$hash'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count) {
        $result = mysqli_fetch_array($query);
        $_SESSION['is_authenticated'] = true;
        $_SESSION['is_verified'] = $result['is_verified'];
        $_SESSION['id'] = $result['id'];
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['last_name'] = $result['last_name'];

        header('Location: ' . BASE_URL . 'dashboard.php');
    }
}

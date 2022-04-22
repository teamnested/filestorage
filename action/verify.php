<?php
session_start();
require_once '../config/connection.php';

$email = $_GET['email'];
$hash = $_GET['hash'];

$sql = "SELECT * FROM users WHERE email='$email' AND hash='$hash'";
$query = mysqli_query($conn, $sql);
$count = mysqli_num_rows($query);
if ($count) {
    $result = mysqli_fetch_array($query);
    $_SESSION['is_authenticated'] = true;
    $_SESSION['id'] = $result['id'];
    $_SESSION['first_name'] = $result['first_name'];
    $_SESSION['last_name'] = $result['last_name'];

    header('Location: ' . BASE_URL . 'dashboard.php');
}

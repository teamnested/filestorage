<?php session_start();
require_once  '../config/connection.php';
include 'send-mail.php';

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];
$otp = rand(100000, 999999);
$hash = md5($otp);

if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
   responseData("All fields are required !", false);
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   responseData("Invalid Email !", false);
} else if (strlen($password) < 8) {
   responseData('Password must be of 8 characters !', false);
} else if ($password != $confirmPassword) {
   responseData('Password and Confirm Password does not match', false);
} else {
   $password = password_hash($password, PASSWORD_DEFAULT);
   $sql = "INSERT INTO users(first_name, last_name, email, password, otp, hash) values ('$firstName', '$lastName', '$email', '$password', '$otp', '$hash')";
   $query = mysqli_query($conn, $sql);

   if ($query) {
      $_SESSION['email'] = $email;
      $selectUser = "SELECT * FROM users WHERE email = '$email'";
      $queryUser = mysqli_query($conn, $selectUser);
      $currentUser = mysqli_fetch_object($queryUser);
      sendVerificationMail($currentUser);
      responseData("Successfully Registered !");
   } else {
      responseData("Something went wrong !", false);
   }
}

function responseData($data, $success = true)
{
   $_SESSION['message'] = $data;
   if ($success) {
      header('Location: ' . BASE_URL . 'auth/verify');
   } else {
      echo "<script>window.history.back();</script>";
   }
}

<?php

session_start();

require_once '../../config/connection.php';
require '../../helpers/common.php';

$folderId = $_POST['folder_id'];
$name = $_FILES['file']['name'];
$userId = $_SESSION['id'];
$fileSlug = str_replace(' ', '-', strtolower($name));
$folderSlug = getFolderSlugById($folderId);
$directory = '../../public/storage/users' . '/' . $userId . '/' . $folderSlug . '/';
$target_file = $directory . basename($_FILES["file"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (checkFileIfExists($userId, $fileSlug)) {
    $_SESSION['is_file_uploaded'] = false;
    $_SESSION['message'] = 'File already exists';
    echo "<script>window.history.back();</script>";
} else {
    $createdAt = strtotime(date('Y-m-d H:i:s'));
    $sql = "INSERT INTO files (user_id, folder_id, name, slug, type, created_at, updated_at) VALUES ('$userId', '$folderId', '$name', '$fileSlug', '$fileType', '$createdAt', '$createdAt')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        $_SESSION['is_file_uploaded'] = true;
        $_SESSION['message'] = 'File Uploaded Successfully';
        header('Location: ' . BASE_URL . 'files');
    } else {
        $_SESSION['is_file_created'] = false;
        $_SESSION['message'] = 'Error Uploading File';
        echo "<script>window.history.back();</script>";
    }
}

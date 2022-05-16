<?php
function checkFolderIfExists($userId, $slug)
{
    global $conn;
    $sql = "SELECT * FROM folders WHERE user_id = '$userId' AND slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function checkFileIfExists($userId, $slug)
{
    global $conn;
    $sql = "SELECT * FROM files WHERE user_id = '$userId' AND slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function getFolders()
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM folders WHERE user_id = $userId";
    $query = mysqli_query($conn, $sql);
    $folders = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['total_files'] = getTotalFilesByFolderId($row['id']);
        $folders[] = $row;
    }
    return $folders;
}

function getFolderSlugById($folderId)
{
    global $conn;
    $sql = "SELECT slug FROM folders WHERE id = '$folderId'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $folderName = $row['slug'];
    return $folderName;
}

function getFilesByFolderSlug($slug)
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT id FROM folders WHERE slug = '$slug' AND user_id = $userId";
    $query = mysqli_query($conn, $sql);
    $folderId = mysqli_fetch_array($query)['id'];
    $fileSql = "SELECT * FROM files WHERE folder_id = $folderId AND user_id = $userId";
    $fileQuery = mysqli_query($conn, $fileSql);
    $files = [];
    if (mysqli_num_rows($fileQuery)) {
        while ($row = mysqli_fetch_assoc($fileQuery)) {
            $files[] = $row;
        }
    }
    return $files;
}

function getTotalFilesByFolderId($folderId)
{
    global $conn;
    $sql = "SELECT * FROM files WHERE folder_id = $folderId";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    return $count;
}

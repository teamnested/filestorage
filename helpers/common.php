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
    $sql = "SELECT * FROM folders WHERE user_id = '$userId' AND deleted_at IS NULL";
    $query = mysqli_query($conn, $sql);
    $folders = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['total_files'] = getTotalFilesByFolderId($row['id']);
        $folders[] = $row;
    }
    return $folders;
}

function getTrashFolders()
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM folders WHERE user_id = '$userId' AND deleted_at IS NOT NULL";
    $query = mysqli_query($conn, $sql);
    $folders = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['total_files'] = getTotalFilesByFolderId($row['id']);
        $folders[] = $row;
    }
    return $folders;
}

function getFolderNameById($folderId)
{
    global $conn;
    $sql = "SELECT * FROM folders WHERE id = $folderId";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    return $row['name'];
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

function getFiles($fileType = null)
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM files WHERE user_id = '$userId' AND deleted_at IS NULL";
    if ($fileType != null) {
        if ($fileType == 'image') {
            $sql .= " AND type = 'jpg' OR type = 'png' OR type = 'jpeg'";
        } else if ($fileType == 'video') {
            $sql .= " AND type = 'mp4' OR type = 'avi' OR type = 'mkv'";
        } else if ($fileType == 'pdf') {
            $sql .= " AND type = '$fileType'";
        } else if ($fileType == 'document') {
            $sql .= " AND type IN ('doc', 'docx', 'txt', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'csv')";
        } else if ($fileType == 'spreadsheet') {
            $sql .= " AND type = 'xls' OR type = 'xlsx' OR type = 'csv' OR type = 'ods' OR type = 'tsv'";
        } else if ($fileType == 'presentation') {
            $sql .= " AND type = 'ppt' OR type = 'pptx' OR type = 'odp' OR type = 'pps' OR type = 'ppsx' OR type = 'odp' OR type = 'pot' OR type = 'potx'";
        }
    }
    $query = mysqli_query($conn, $sql);
    $files = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $folderSlug = getFolderSlugById($row['folder_id']);
        if ($row['type'] == 'pptx') {
            $imageUrl = BASE_URL . 'assets/images/file-type/ppt.png';
        } else {
            $imageUrl = BASE_URL . 'assets/images/file-type/' . $row['type'] . '.png';
        }
        $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
        if ($row['type'] == 'jpg' || $row['type'] == 'jpeg' || $row['type'] == 'png' || $row['type'] == 'gif') {
            $row['image_url'] = $fileDirectory;
        } else {
            $row['image_url'] = $imageUrl;
        }
        $row['file_name'] = $row['slug'] . '.' . $row['type'];
        $row['file_dir'] = $fileDirectory;
        $row['modified_date_time'] = date('jS M, Y', strtotime($row['updated_at']));

        // Get Directory Size Starts from Here
        $directory = 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
        $size = filesize($directory) / 1024;
        if ($size > (1024 * 1024))
            $fileSize = number_format(($size / (1024 * 1024)), 2) . ' GB';
        else if ($size > 1024 && $size < (1024 * 1024))
            $fileSize = number_format(($size / 1024), 2) . ' MB';
        else
            $fileSize = number_format($size, 2) . ' KB';
        $row['size'] = $fileSize;
        // Get Directory Size Ends Here
        $files[] = $row;
    }
    return $files;
}

function getTrashFiles($fileType = null)
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM files WHERE user_id = '$userId' AND deleted_at IS NOT NULL";
    if ($fileType != null) {
        if ($fileType == 'image') {
            $sql .= " AND type = 'jpg' OR type = 'png' OR type = 'jpeg'";
        } else if ($fileType == 'video') {
            $sql .= " AND type = 'mp4' OR type = 'avi' OR type = 'mkv'";
        } else if ($fileType == 'pdf') {
            $sql .= " AND type = '$fileType'";
        } else if ($fileType == 'document') {
            $sql .= " AND type = 'pdf' OR type = 'doc' OR type = 'docx' OR type = 'txt' OR type = 'xls' OR type = 'xlsx' OR type = 'ppt' OR type = 'pptx' OR type = 'csv'";
        } else if ($fileType == 'spreadsheet') {
            $sql .= " AND type = 'xls' OR type = 'xlsx' OR type = 'csv' OR type = 'ods' OR type = 'tsv'";
        } else if ($fileType == 'presentation') {
            $sql .= " AND type = 'ppt' OR type = 'pptx' OR type = 'odp' OR type = 'pps' OR type = 'ppsx' OR type = 'odp' OR type = 'pot' OR type = 'potx'";
        }
    }
    $query = mysqli_query($conn, $sql);
    $files = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $folderSlug = getFolderSlugById($row['folder_id']);
        if ($row['type'] == 'pptx') {
            $imageUrl = BASE_URL . 'assets/images/file-type/ppt.png';
        } else {
            $imageUrl = BASE_URL . 'assets/images/file-type/' . $row['type'] . '.png';
        }
        $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
        if ($row['type'] == 'jpg' || $row['type'] == 'jpeg' || $row['type'] == 'png' || $row['type'] == 'gif') {
            $row['image_url'] = $fileDirectory;
        } else {
            $row['image_url'] = $imageUrl;
        }
        $row['file_name'] = $row['slug'] . '.' . $row['type'];
        $row['file_dir'] = $fileDirectory;
        $files[] = $row;
    }
    return $files;
}

function getFilesByFolderSlug($folderSlug)
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT id FROM folders WHERE slug = '$folderSlug' AND user_id = $userId";
    $query = mysqli_query($conn, $sql);
    $folderId = mysqli_fetch_array($query)['id'];
    $fileSql = "SELECT * FROM files WHERE folder_id = $folderId AND user_id = $userId";
    $fileQuery = mysqli_query($conn, $fileSql);
    $files = [];
    if (mysqli_num_rows($fileQuery)) {
        while ($row = mysqli_fetch_assoc($fileQuery)) {
            if ($row['type'] == 'pptx') {
                $imageUrl = BASE_URL . 'assets/images/file-type/ppt.png';
            } else {
                $imageUrl = BASE_URL . 'assets/images/file-type/' . $row['type'] . '.png';
            }
            $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
            if ($row['type'] == 'jpg' || $row['type'] == 'jpeg' || $row['type'] == 'png' || $row['type'] == 'gif') {
                $row['image_url'] = $fileDirectory;
            } else {
                $row['image_url'] = $imageUrl;
            }
            $row['file_name'] = $row['slug'] . '.' . $row['type'];
            $row['file_dir'] = $fileDirectory;
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

function getStorageDetails($directory = null)
{
    global $conn;
    $userId = $_SESSION['id'];
    $subscriptionSql = "SELECT * FROM subscriptions WHERE user_id = $userId";
    $subscriptionQuery = mysqli_query($conn, $subscriptionSql);
    $packageId = mysqli_fetch_assoc($subscriptionQuery)['package_id'];
    $packageSql = "SELECT * FROM packages WHERE id = $packageId";
    $packageQuery = mysqli_query($conn, $packageSql);
    $package = mysqli_fetch_assoc($packageQuery);
    $totalStorage = $package['storage_size'];
    if ($totalStorage >= (1024 * 1024)) {
        $storageDetails['totalStorage'] = number_format($totalStorage / (1024 * 1024), 0) . ' GB';
    } else if ($totalStorage >= 1024 && $totalStorage < (1024 * 1024)) {
        $storageDetails['totalStorage'] = number_format($totalStorage / 1024, 0) . ' MB';
    } else {
        $storageDetails['totalStorage'] = number_format($totalStorage, 0) . ' KB';
    }
    $sql = "SELECT * FROM files WHERE user_id = '$userId'";
    $query = mysqli_query($conn, $sql);
    $size = 0;
    while ($row = mysqli_fetch_assoc($query)) {
        $folderSlug = getFolderSlugById($row['folder_id']);
        $directory = 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
        $size += filesize($directory);
    }
    // Get Directory Size Starts from Here
    $size = $size / 1024;
    if ($size >= (1024 * 1024)) {
        $totalUsedSpace = number_format($size / (1024 * 1024), 0);
        $storageDetails['totalUsedSpace'] = $totalUsedSpace . ' GB';
        $storageDetails['totalUsedSpacePercent'] = number_format((($size / $totalStorage) * 100), 2);
    } else if ($size >= 1024 && $size < (1024 * 1024)) {
        $totalUsedSpace = number_format($size / 1024, 0);
        $storageDetails['totalUsedSpace'] = $totalUsedSpace . ' MB';
        $storageDetails['totalUsedSpacePercent'] = number_format((($size / $totalStorage) * 100), 2);
    } else {
        $totalUsedSpace = number_format($size, 0);
        $storageDetails['totalUsedSpace'] = $totalUsedSpace . ' KB';
        $storageDetails['totalUsedSpacePercent'] = number_format(($size / $totalStorage), 2);
    }
    $freeStorage = $totalStorage - $size;
    if ($freeStorage >= (1024 * 1024)) {
        $storageDetails['freeStorage'] = number_format($freeStorage / (1024 * 1024), 0) . ' GB';
    } else if ($freeStorage >= 1024 && $freeStorage < (1024 * 1024)) {
        $storageDetails['freeStorage'] = number_format($freeStorage / 1024, 0) . ' MB';
    } else {
        $storageDetails['freeStorage'] = number_format($freeStorage, 0) . ' KB';
    }
    // Get Directory Size Ends Here
    return $storageDetails;
}

function checkPremiumPackage()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM packages WHERE name = 'Premium'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_fetch_array($query)['COUNT(*)'];
    if ($count) {
        return true;
    } else {
        return false;
    }
}

function getActivePlans()
{
    global $conn;
    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM packages WHERE is_active = 1";
    $query = mysqli_query($conn, $sql);
    $plans = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['is_subscribed'] = false;
        $planId = $row['id'];
        $subscriptionSql = "SELECT * FROM subscriptions WHERE user_id = '$userId' AND package_id = '$planId' ORDER BY id DESC LIMIT 1";
        $subscriptionQuery = mysqli_query($conn, $subscriptionSql);
        if (mysqli_num_rows($subscriptionQuery)) {
            $row['is_subscribed'] = true;
        }
        $size = $row['storage_size'];
        if ($size >= (1024 * 1024)) {
            $storageSize = number_format($size / (1024 * 1024), 0);
            $row['storage_size'] = $storageSize . ' GB';
        } else if ($size >= 1024 && $size < (1024 * 1024)) {
            $storageSize = number_format($size / 1024, 0);
            $row['storage_size'] = $storageSize . ' MB';
        } else {
            $storageSize = number_format($size, 0);
            $row['storage_size'] = $storageSize . ' KB';
        }
        $plans[] = $row;
    }
    return $plans;
}

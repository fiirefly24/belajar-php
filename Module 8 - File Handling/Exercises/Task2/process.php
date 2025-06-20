<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get file
    $rawFile = $_FILES["file"];
    if (!isset($rawFile) || $rawFile["error"] !== UPLOAD_ERR_OK)  {
        die("Error Uploading file");
     } 

    // Sanitize filename
    $tmp_name = $rawFile['tmp_name'];
    $originalName = $rawFile['name'];
    $cleanName = basename($originalName);
    $extension = strtolower(pathinfo($cleanName, PATHINFO_EXTENSION));

    // Allowed types
    $fileTypes = ["jpg", "txt"];
    if (!in_array($extension, $fileTypes)) {
        die("Invalid type!");
    }

    // Validate mime type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $tmp_name);
    finfo_close($finfo);
    $allowedMimeTypes = ['image/jpg', 'text/plain'];

    if (!in_array($mimeType, $allowedMimeTypes)) {
        die("Only image and text files are allowed");
    }

    // Generate unique name
    $newName = uniqid('img_', true) . '.' . $extension;
    $uploadPath = "uploads/" . $newName;

    // Folder, upload
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, false);
    }

    if (!move_uploaded_file($tmp_name, $uploadPath)) {
        die("failed to upload");
    }

    echo "✅ Uploaded as: $newName and the file is $tmp_name";
    
}
    
?>

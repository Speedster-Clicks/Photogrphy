<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images'])) {
    $targetDir = 'uploads';  // Upload directory
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);  // Create directory if it doesn't exist
    }

    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    $totalFiles = count($_FILES['images']['name']); // Count number of uploaded files

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = basename($_FILES['images']['name'][$i]);
        $targetFile = $targetDir . '/' . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        if ($_FILES['images']['tmp_name'][$i] && getimagesize($_FILES['images']['tmp_name'][$i]) === false) {
            echo "Error: File $fileName is not a valid image.<br>";
            continue;
        }

        // Check file size (max 5MB)
        if ($_FILES['images']['size'][$i] > 5000000) {
            echo "Error: File $fileName is too large.<br>";
            continue;
        }

        // Check file format
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Error: Only JPG, JPEG, PNG & GIF files are allowed for $fileName.<br>";
            continue;
        }

        // Upload file
        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFile)) {
            echo "Success: $fileName has been uploaded.<br>";
        } else {
            echo "Error: There was an issue uploading $fileName.<br>";
        }
    }

    // Redirect to gallery after upload
    header("Location: gallery.php");
    exit();
} else {
    echo "Error: No files were uploaded.<br>";
}
?>

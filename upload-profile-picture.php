<?php
session_start();
include('db.php');

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
        $file = $_FILES['profile_picture'];

        // Check if there were errors during upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die("Error uploading file.");
        }

        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            die("Invalid file type.");
        }

        // Define file path
        $uploadDir = 'uploads/profile_pictures/';
        $fileName = uniqid() . '-' . basename($file['name']); // Use unique ID to avoid name collisions
        $filePath = $uploadDir . $fileName;

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Update profile picture in the database
            $username = $_SESSION['username'];
            $sql = "UPDATE users SET profile_picture = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param('ss', $filePath, $username);
            if ($stmt->execute()) {
                // Update session variable
                $_SESSION['profile_picture'] = $filePath;
                header("Location: update-profile-picture.php"); // Redirect to the update profile picture page
            } else {
                die("Error updating profile picture.");
            }
            $stmt->close();
        } else {
            die("Error moving uploaded file.");
        }
    } else {
        die("No file uploaded.");
    }
} else {
    die("User not logged in.");
}
?>

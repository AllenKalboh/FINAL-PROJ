<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skincare_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User input
$email = trim($_POST['email']);

// Store email in session
$_SESSION['reset_email'] = $email;

// Prepare and execute query
$sql = "SELECT email FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Email found in the database
    echo "<script>
            alert('A Reset Code has been sent to you. Kindly check your email.');
            window.location.href = 'enter-code.php';
          </script>";
} else {
    // Email not found in the database
    echo "<script>
            alert('Email not found');
            window.location.href = 'request-reset.php';
          </script>";
}

$stmt->close();
$conn->close();
?>

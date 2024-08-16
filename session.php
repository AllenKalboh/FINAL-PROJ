<?php
include ('db.php');

session_start()

// Get username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the user exists
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If user exists, set session variables
    $_SESSION['username'] = $username;
    header("Location: index,php"); // Redirect to a protected page
} else {
    // If user does not exist, redirect to login with an error
    header("Location: login,php");
}

$conn->close();
?>
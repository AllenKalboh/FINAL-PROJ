<?php
// Start the session
session_start();

// Include the database connection file
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username from the session
$session_username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $conn->real_escape_string($_POST['email']);
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $conn->real_escape_string($_POST['address']);
    $phone_number = $conn->real_escape_string($_POST['phoneNumber']);

    // Prepare the SQL statement
    $sql = "UPDATE users SET 
            email = '$email',
            first_name = '$first_name',
            last_name = '$last_name',
            password_hash = '$password',
            address = '$address',
            phone_number = '$phone_number',
            updated_at = CURRENT_TIMESTAMP
            WHERE username = '$session_username'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record updated successfully")</script>'; 
        header("Location: profilepage.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
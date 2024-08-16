<?php
include('db.php');
include ('session.php');
// Database configuration
$host = 'localhost'; // Change if your database host is different
$dbname = 'skincare';
$username = 'root'; // Change if your database username is different
$password = ''; // Change if your database password is different

// Create a connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $userName = mysqli_real_escape_string($conn, trim($_POST['username']));
    $firstName = mysqli_real_escape_string($conn, trim($_POST['first-name']));
    $lastName = mysqli_real_escape_string($conn, trim($_POST['last-name']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $phoneNumber = mysqli_real_escape_string($conn, trim($_POST['phoneNumber']));
    
    // Hash the password for security (optional)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Validate required fields
    if (empty($userName) || empty($firstName) || empty($lastName) || empty($password) || empty($address) || empty($phoneNumber)) {
        die("All fields are required.");
    }

    // Prepare the SQL update query
    $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', password = '$hashedPassword', address = '$address', phone_number = '$phoneNumber' WHERE username = '$userName'";

    if (mysqli_query($conn, $sql)) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    die("Invalid request method.");
}
?>


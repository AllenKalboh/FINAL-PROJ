<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Set parameters and execute
    $username = $_POST['username'];
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password_hash'];
        
        // Debugging: Print out hashed password from database and input password
        echo "<pre>";
        echo "Hashed Password in DB: " . $hashedPassword . "<br>";
        echo "Input Password: " . $_POST['password'] . "<br>";
        echo "</pre>";
        
        if (password_verify($_POST['password'], $hashedPassword)) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['admin_id'] = $row['admin_id'];

            header('Location: admin_page.php');
            exit();
        } else {
            echo "<script>alert('Password does not match');</script>";
        }
    } else {
        echo "<script>alert('No username found in server');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

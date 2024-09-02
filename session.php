<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];

            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Password does not match');</script>";
            header('Location: login.php');
        }
    } else {
        echo "<script>alert('No username found in server');</script>";
        header('Location: login.php');
    }
    $conn->close();
}
?>

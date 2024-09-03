<?php
// Start the session
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skincare_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the reset request page if user_id is not set
    header("Location: request-reset.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the new password from the form
    $new_password = trim($_POST['new_password']);
    $user_id = $_SESSION['user_id']; // Get user_id from session

    // Hash the new password
    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $sql = "UPDATE users SET password_hash = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $password_hash, $user_id);

    if ($stmt->execute()) {
        $message = "Password updated successfully!";
        // Clear session data
        session_unset();
        session_destroy();
    } else {
        $message = "Error updating password: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid black;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 15px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            margin-top: 15px;
            width: 93%;
            padding: 8px;
            border: 1px solid black;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #ccc;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #bbb;
        }
        .message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Your Password</h2>
        <form action="reset-password.php" method="post">
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Reset Password">
            </div>
            <?php if (isset($message)): ?>
                <div class="message"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>

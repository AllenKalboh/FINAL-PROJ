<?php
session_start(); // Start the session

// Hardcoded password
define('ADMIN_PASSWORD', 'admin1234');

// Check if form is submitted
if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    // Validate the password
    if ($password === ADMIN_PASSWORD) {
        $_SESSION['loggedin'] = true;
        header('Location: admin_page.php'); // Redirect to admin dashboard or another page
        exit();
    } else {
        $error = 'Invalid Username and Password.';
    }
}

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header('Location: admin_page.php'); // Redirect to admin dashboard or another page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_loginss.css">
</head>
<body>
    <div class="login-form">
    <div style="text-align: center;">
  <img src="images/icons/logoo.png" alt="" style="width: 200px;">
</div>
        <h2>Admin</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter Username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>

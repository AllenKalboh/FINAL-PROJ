<?php
include('db.php');
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Account</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class="container">
        <h2>Modify Account</h2>
        <form method="post" action="update.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last-name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phonenumber" name="phoneNumber" required>

            <button type="submit" class="edit-btn">Save Changes</button>
        </form>

        <a href="profilepage.php"><button type="button" class="go-back">Go Back</button></a>
    </div>
</body>
</html>
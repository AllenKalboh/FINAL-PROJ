<?php
// Start the session
session_start();

// Include database configuration if needed here
// For example:
// include 'db_config.php'; 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Validate email and process reset link generation (example placeholder code)
    // You should query your database to verify the email and generate a reset link
    // For demonstration, we'll assume the email is valid and simulate success.

    $_SESSION['reset_email'] = $email; // Store email in session for further processing
    // Ideally, here you would generate a reset token and send an email with the link.

    // Redirect to a confirmation or reset page
    header("Location: check-email.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Password Reset</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5; /* Light grey background */
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff; /* White background for the form */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: solid black 1px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333; /* Dark grey text */
            font-size: 24px;
        }

        label {
            color: #333; /* Dark grey text */
            margin-bottom: 8px;
        }

        input[type="email"] {
            border: 1px solid #ccc; /* Light grey border */
            border-radius: 4px;
            padding: 8px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            background-color: #333; /* Black background for the button */
            color: #fff; /* White text */
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 12px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #555; /* Slightly lighter black on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <form method="POST" action="forgot_password.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Generate Reset Link">
        </form>
    </div>
</body>
</html>

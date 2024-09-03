<?php
session_start();

// Example code to retrieve the email from the session
$email = isset($_SESSION['reset_email']) ? $_SESSION['reset_email'] : '';

$correct_code = "504402";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_code = trim($_POST['reset_code']);

    if ($user_code === $correct_code) {
        header("Location: reset-password.php");
        exit();
    } else {
        $error_message = "Invalid reset code. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Reset Code</title>
    <link rel="stylesheet" href="enter-code.css">
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
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
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
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
     <div class="container">
        <h2>Verify Reset Code</h2>
        <form action="verify-code.php" method="post">
            <div class="form-group">
                <label for="reset_code">Enter Reset Code:</label>
                <input type="number" id="reset_code" name="reset_code" required placeholder=" * * * * * * " 
                       min="0" max="999999" style="text-align: center;">
            </div>
            <div class="form-group">
                <input type="submit" value="Verify Code">
            </div>
            <?php if (isset($error_message)): ?>
                <div class="error"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>

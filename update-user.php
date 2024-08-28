<?php
// Database connection
$servername = "localhost";
$db_username = "root"; // Use the correct username
$db_password = ""; // Use the correct password, if any
$database = "skincare_db"; // Ensure this database exists

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $old_username = $conn->real_escape_string($_POST['old_username']); // Current username for reference
    $new_username = $conn->real_escape_string($_POST['new_username']); // New username
    $email = $conn->real_escape_string($_POST['email']);
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $password = $_POST['password']; // Get raw password for validation
    $address = $conn->real_escape_string($_POST['address']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);

    // Validate password
    if (!preg_match('/^(?=.*[!@#$%^&*(),.?\[\]{}|<>])(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password)) {
        $error = "Password must be at least 8 characters long and contain at least one special character, one letter, and one number.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to update user data
        $stmt = $conn->prepare("UPDATE users SET username=?, email=?, first_name=?, last_name=?, password_hash=?, address=?, phone_number=? WHERE username=?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters: new username first, then the rest, and old username in WHERE clause
        $stmt->bind_param('ssssssss', $new_username, $email, $first_name, $last_name, $hashed_password, $address, $phone_number, $old_username);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $success = "Record updated successfully";
                // Update session or other related information if necessary
                $_SESSION['username'] = $new_username; // Assuming you want to update the session username
            } else {
                $error = "No record updated. Check if the old username exists or if the new username already exists.";
            }
        } else {
            $error = "Error updating record: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Account</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script>
        function showAlert(message) {
            alert(message);
        }

        function validatePassword() {
            const password = document.getElementById('password').value;
            const regex = /^(?=.*[!@#$%^&*(),.?\[\]{}|<>])(?=.*[A-Za-z])(?=.*\d).{8,}$/;

            if (!regex.test(password)) {
                showAlert('Password must be at least 8 characters long and contain at least one special character, one letter, and one number.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Modify Account</h2>
        <form method="post" action="" onsubmit="return validatePassword()">
            <label for="old_username">Current Username:</label>
            <input type="text" id="old_username" name="old_username" required>

            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required
                   minlength="8" 
                   pattern="(?=.*[!@#$%^&*(),.?\[\]{}|<>])(?=.*[A-Za-z])(?=.*\d).{8,}"
                   title="Password must be at least 8 characters long, contain at least one letter, one number, and one special character.">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <button type="submit" class="edit-btn">Save Changes</button>
        </form>

        <a href="profilepage.php"><button type="button" class="go-back">Go Back</button></a>

        <!-- Display error or success messages -->
        <?php if (isset($error)) { ?>
            <script>
                showAlert("<?php echo addslashes($error); ?>");
            </script>
        <?php } ?>
        <?php if (isset($success)) { ?>
            <script>
                showAlert("<?php echo addslashes($success); ?>");
            </script>
        <?php } ?>
    </div>
</body>
</html>

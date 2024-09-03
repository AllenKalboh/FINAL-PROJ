<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $password = $_POST['password']; // Get the raw password for validation
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phoneNumber'];

    // Validate password
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*(),.?"{}|<>]).{8,}$/', $password)) {
        echo "<script>alert('Password must be at least 8 characters long, contain at least one letter, one number, and one special character.');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert user data
        $stmt = $conn->prepare("INSERT INTO users (username, password_hash, email, first_name, last_name, address, gender, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssssss', $username, $hashed_password, $email, $first_name, $last_name, $address, $gender, $phone_number);

        if ($stmt->execute()) {
            echo "<script>alert('Registration Successful. Please log in.');</script>";
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

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
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registrationForm" method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" placeholder="Enter Username" name="username" required>

    <label for="email">Email:</label>
    <input type="email" id="email" placeholder="Enter Email" name="email" required>

    <label for="first-name">First Name:</label>
    <input type="text" id="first-name" placeholder="Enter First Name" name="first-name" required>

    <label for="last-name">Last Name:</label>
    <input type="text" id="last-name" placeholder="Enter Last Name" name="last-name" required>

    <label for="password">Password:</label>
    <div class="password-toggle">
        <input type="password" id="password" placeholder="Enter Password" name="password" required
        minlength="8" 
        pattern="(?=.*[A-Z,a-z])(?=.*\d)(?=.*[!@#$%^&*(),.?'{}|<>]).{8,}"
        title="Password must be at least 8 characters long and contain at least one letter, one number, and one special character.">
        <input type="checkbox" id="togglePassword" style="margin-bottom: 15px;"> Show Password
    </div>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required style="margin-bottom: 15px;">
        <option value="" disabled selected>Select Your Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
    </select>

    <label for="address">Address:</label>
    <select id="address" name="address" required style="margin-bottom: 15px;">
        <option value="" disabled selected>Select Your Location</option>
        <option value="Cavite City">Cavite City</option>
        <option value="Bacoor">Bacoor</option>
        <option value="Dasmariñas">Dasmariñas</option>
        <option value="Imus">Imus</option>
        <option value="Tagaytay">Tagaytay</option>
        <option value="Trece Martires">Trece Martires</option>
        <option value="Amadeo">Amadeo</option>
        <option value="Gen. Trias">Gen. Trias</option>
        <option value="Kawit">Kawit</option>
        <option value="Magallanes">Magallanes</option>
        <option value="Maragondon">Maragondon</option>
        <option value="Mendez">Mendez</option>
        <option value="Naic">Naic</option>
        <option value="Noveleta">Noveleta</option>
        <option value="Rosario">Rosario</option>
        <option value="Silang">Silang</option>
        <option value="Tanza">Tanza</option>
        <option value="Ternate">Ternate</option>
        <option value="Trece">Trece</option>
    </select>

    <label for="phone-number">Phone Number:</label>
    <input type="text" id="phone-number" placeholder="Enter Phone Number" name="phoneNumber" required
           pattern="\d{11}" title="Phone number must be exactly 11 digits."
           oninput="validatePhoneNumber(this)">
    
    <button type="submit" class="reg-btn">Create Account</button>
</form>
<p class="login-here">Already have an account?</p>
<a href="login.php"><button type="button" class="login-btn">Login</button></a>

<script>
function validatePhoneNumber(input) {
    if (input.value.length > 11) {
        input.value = input.value.slice(0, 11);
    }
}
</script>

</body>

<script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('change', function (e) {
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        });
</script>

</html>

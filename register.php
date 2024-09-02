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
        <form method="post" action="">
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
                <option value="Metro Manila">Metro Manila</option>
                <option value="Abra">Abra</option>
                <option value="Apayao">Apayao</option>
                <option value="Benguet">Benguet</option>
                <option value="Ifugao">Ifugao</option>
                <option value="Kalinga">Kalinga</option>
                <option value="Mountain Province">Mountain Province</option>
                <option value="Ilocos Norte">Ilocos Norte</option>
                <option value="Ilocos Sur">Ilocos Sur</option>
                <option value="La Union">La Union</option>
                <option value="Pangasinan">Pangasinan</option>
                <option value="Batanes">Batanes</option>
                <option value="Cagayan">Cagayan</option>
                <option value="Isabela">Isabela</option>
                <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                <option value="Quirino">Quirino</option>
                <option value="Aurora">Aurora</option>
                <option value="Bataan">Bataan</option>
                <option value="Bulacan">Bulacan</option>
                <option value="Nueva Ecija">Nueva Ecija</option>
                <option value="Pampanga">Pampanga</option>
                <option value="Tarlac">Tarlac</option>
                <option value="Zambales">Zambales</option>
                <option value="Batangas">Batangas</option>
                <option value="Cavite">Cavite</option>
                <option value="Laguna">Laguna</option>
                <option value="Quezon">Quezon</option>
                <option value="Rizal">Rizal</option>
                <option value="Marinduque">Marinduque</option>
                <option value="Occidental Mindoro">Occidental Mindoro</option>
                <option value="Oriental Mindoro">Oriental Mindoro</option>
                <option value="Palawan">Palawan</option>
                <option value="Romblon">Romblon</option>
                <option value="Albay">Albay</option>
                <option value="Camarines Norte">Camarines Norte</option>
                <option value="Camarines Sur">Camarines Sur</option>
                <option value="Catanduanes">Catanduanes</option>
                <option value="Masbate">Masbate</option>
                <!-- Add more options as needed -->
            </select>

            <label for="phone-number">Phone Number:</label>
            <input type="text" id="phonenumber" placeholder="Enter Phone Number" name="phoneNumber" maxlength="11" oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);" required>

            <button type="submit" class="reg-btn">Create Account</button>
        </form>
        <p class="login-here">Already have an account?</p>
        <a href="login.php"><button type="button" class="login-btn">Login</button></a>
    </div>
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

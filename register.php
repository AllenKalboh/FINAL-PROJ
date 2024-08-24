<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone_number = $_POST['phoneNumber'];

    //                                                     database columns
    $sql = "INSERT INTO users(username, password_hash, email, first_name, last_name, address, phone_number )
    VALUES('$username', '$password', '$email', '$first_name', '$last_name', '$address', '$phone_number')";

    if($conn->query($sql)===TRUE){
        echo "<script>alert('Registration Successful. Please log in.');</script>";
    } else{
        echo "Error: " .$sql ."<br>". $conn->error;
    }
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
            <input type="password" id="password" placeholder="Enter Password" name="password" minlength="8" required>

            <label for="address">Address:</label>
            <select id="address" name="address" required>
                <option value="" disabled selected>Select Your Location</option>
                <option value="Location 1">Location 1</option>
                <option value="Location 2">Location 2</option>
                <option value="Location 3">Location 3</option>
                <!-- Add more options as needed -->
            </select>

            <label for="phone-number">Phone Number:</label>
            <input type="number" id="phonenumber" placeholder="Enter Phone Number" name="phoneNumber" maxlength="11" oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);" required>

            <button type="submit" class="reg-btn">Create Account</button>
        </form>
        <p class="login-here">Already have an account?</p>
        <a href="login.php"><button type="button" class="login-btn">Login</button></a>
    </div>
</body>
</html>

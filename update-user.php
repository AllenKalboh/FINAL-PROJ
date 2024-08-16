<?php
include('db.php');

include ('session.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone_number = $_POST['phoneNumber'];

    //                                                     database columns
    $sql = "INSERT INTO users(username, password_hash, email, first_name, last_name, address, phone_number ) VALUES('$username', '$password', '$email', '$first_name', '$last_name', '$address', '$phone_number')";

    if($conn->query($sql)===TRUE){
        echo "<script>alert('Registration Succesful');</script>";
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
    <link rel="stylesheet" type="text/css" href="logins.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post" action="update.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name" required>

            <label for="last-name">Last name:</label>
            <input type="text" id="last-name" name="last-name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone-number">Phone Number:</label>
            <input type="number" id="phonenumber" name="phoneNumber" required>

            <button type="submit" class="edit-btn">Edit</button>
            
        </form>
        <a href = "register.php"> <button type="submit" class="edit-btn">Go Back</button> </a>
    </div>
</body>
</html>
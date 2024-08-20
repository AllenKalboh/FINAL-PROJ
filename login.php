<?php
include('db.php');
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinLine Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="logins.css">
</head>
<body>

<!--  Login Form  -->


<!-- IN PROGRESS PA YUNG PAG CLINICK YUNG "MY ACCOUNT" Button mag popop up lang sa gitna yung login form-->


<div class="container">
        <div class="left">
            <img src="images/loginimg.png" alt="Left Side Image" class="left-image">
        </div>
        <div class="right">
            <img src="images/icons/logtxt.png" alt="Logo Text" class="right-icon">
            <form action="" method="post">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit" class="log-in-btn">Login</button>
                <p> Don't have an account? </p>
                
            </form>
            <a href="register.php"> <button type="submit" class="reg-btn">Register</button> </a>
        </div>
    </div>
</body>
</html>
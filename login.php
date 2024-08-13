<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="SELECT*FROM users WHERE username='$username'";
    $result=$conn->query($sql);

    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            header("Location: index.html");
        }else{
            echo "<script>alert('Password does not match');</script>";
        }
    }else{ 
        echo "<script>alert('No username found in server');</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<!--  Login Form  -->

<i class="fa-light fa-house"></i>

<div class="container">
        <h2>Login</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" class="log-in-btn">Login</button>
        </form>
        <p>Don't have an account? </p>
        
        <a href="register.php"> <button type="submit" class="reg-btn">  Register </button> </a> 
    </div>




</body>
</html>
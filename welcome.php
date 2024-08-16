<?php
include ('db.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    
</head>
<body>
    
    <div class="container" id="container-welcome">
        <h2> Welcome </h2>
        <p> You have successfully logged in! </p>
        <button class="log-out-btn"> <a href="index.php"> Logout </a> </button>
    </div>

</body>
</html>
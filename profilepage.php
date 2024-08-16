<?php
include ('db.php');
include ('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare Profile Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="profiles.css">
</head>
<body>
    <div class="sidebar">
        <a href="#"><i class="fas fa-home" style="font-size: 24px;"></i><span>Home</span></a>
        <a href="#"><i class="fas fa-box" style="font-size: 24px;"></i><span>Orders</span></a>
        <a href="update-user.php"><i class="fas fa-user" style="font-size: 24px;"></i><span>Update account</span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 24px;"></i><span>Logout</span></a>
    </div>

    <div class="content">
        <div class="container">
            <div class="profile-header">
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <div class="ml-3">
                    <h1>Patrick Allen Skrrrr </h1>
                    <p>User</p>
                </div>
            </div>
            <div class="profile-info">
                <h2>About Me</h2>
                <p>
                    <?php
                        echo htmlspecialchars($_SESSION['username']);
                    ?>
                </p>

                <h2>First Name</h2>
                <p>
                    <?php
                        echo htmlspecialchars($_SESSION['first_name']);
                    ?>
                </p>

                <h2>Last Name</h2>
                <p>
                    <?php
                        echo htmlspecialchars($_SESSION['last_name']);
                    ?>
                </p>

                <h2>Address</h2>
                <p>
                    <?php
                        echo htmlspecialchars($_SESSION['address']);
                    ?>
                </p>

                <h2>Email</h2>
                <p>
                    <?php
                        echo htmlspecialchars($_SESSION['email']);
                    ?>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

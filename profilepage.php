<?php
include('db.php');
include('session.php');

/*
if (isset($_SESSION['username'])) {

    $sql = "SELECT first_name, last_name, email, address FROM users WHERE username = '?'";
    $result = $conn->query($sql);
    
*/
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT first_name, last_name, email, address FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['email'] = $row['email'];
    }
    $stmt->close();
}

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
        <a href="index.php"><i class="fas fa-home" style="font-size: 24px;"></i><span>Home</span></a>
        <a href="shoping-cart.php"><i class="fas fa-box" style="font-size: 24px;"></i><span>Orders</span></a>
        <a href="update-user.php"><i class="fas fa-user" style="font-size: 24px;"></i><span>Update account</span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 24px;"></i><span>Logout</span></a>
    </div>

    <div class="content">
        <div class="container">
            <div class="profile-header">
                <img src="images\icons\user-icon-with-question-mark-vector-20383364-removebg-preview.png" alt="Profile Picture">
                <div class="ml-3">
                    <h1 style="font-weight: bolder;">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo htmlspecialchars($_SESSION['username']);
                        } else {
                            echo "Guest";
                        }
                        ?> 
                    </h1>

                    <p>User</p>
                    
                </div>
            </div>
            <div class="profile-info">
                <h5>About Me</h5>
                <h4>
                    <?php
                    echo htmlspecialchars($_SESSION['username']);
                    ?>
                </h4>

                <h5>First Name</h5>
                <h4>
                    <?php
                    echo htmlspecialchars($_SESSION['first_name']);
                    ?>
                </h4>

                <h5>Last Name</h5>
                <h4>
                    <?php
                    echo htmlspecialchars($_SESSION['last_name']);
                    ?>
                </h4>

                <h5>Address</h5>
                <h4>
                    <?php
                    echo htmlspecialchars($_SESSION['address']);
                    ?>
                </h4>

                <h5>Email</h5>
                <h4>
                    <?php
                    echo htmlspecialchars($_SESSION['email']);
                    ?>
                </h4>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    h5{
        font-weight: bolder;
    }
    h4{
        font-weight: lighter;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
</html>
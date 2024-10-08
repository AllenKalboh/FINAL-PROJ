<?php
session_start();
include('db.php');

// Fetch user data including the profile picture
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT first_name, last_name, gender, email, address, profile_picture FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['profile_picture'] = $row['profile_picture']; // Save profile picture path in session
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
    <link rel="stylesheet" href="profiles_page.css">
    <link rel="icon" type="image/png" href="images/icons/logoinvert.png"/>
</head>
<body>
<div class="sidebar">
    <a href="profilepage.php"><i class="fas fa-user" style="font-size: 24px;"></i><span>Your Profile</span></a>
    <a href="index.php"><i class="fas fa-home" style="font-size: 24px;"></i><span>Home</span></a>
    <a href="orders.php"><i class="fas fa-box" style="font-size: 24px;"></i><span>Orders</span></a>
    <a href="to-rate.php"><i class="fas fa-star" style="font-size: 24px;"></i><span>To Rate</span></a>
    <a href="shoping-cart.php"><i class="fas fa-shopping-cart" style="font-size: 24px;"></i><span>Your Cart</span></a>
    <a href="update-user.php"><i class="fas fa-user" style="font-size: 24px;"></i><span>Update account</span></a>
    <a href="update-profile-picture.php"><i class="fas fa-camera" style="font-size: 24px;"></i><span>Update Profile Picture</span></a>
    <a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 24px;"></i><span>Logout</span></a>
</div>

    <div class="content">
        <div class="container">
            <div class="profile-header">
            <?php
                $profilePicPath = isset($_SESSION['profile_picture']) && !empty($_SESSION['profile_picture']) 
                    ? htmlspecialchars($_SESSION['profile_picture']) 
                    : 'images/icons/icon-user.png';
            ?>
            <img src="<?php echo $profilePicPath; ?>" alt="Profile Picture">
            <div class="ml-3">
                <h1 style="font-weight: bolder;">
                <?php
                    echo isset($_SESSION['username']) 
                    ? htmlspecialchars($_SESSION['username']) 
                    : "Guest";
                ?>
        </h1>
        <p>User</p>
    </div>
</div>
            <div class="profile-info">
                <h3 style="font-weight: bolder; color: #333; margin-bottom: 25px;">Your Details:</h3>
                <h5>Username</h5>
                <h4><?php echo htmlspecialchars($_SESSION['username']); ?></h4>

                <h5>First Name</h5>
                <h4><?php echo htmlspecialchars($_SESSION['first_name']); ?></h4>

                <h5>Last Name</h5>
                <h4><?php echo htmlspecialchars($_SESSION['last_name']); ?></h4>

                <h5>Gender</h5>
                <h4><?php echo htmlspecialchars($_SESSION['gender']); ?></h4>

                <h5>Address</h5>
                <h4><?php echo htmlspecialchars($_SESSION['address']); ?></h4>

                <h5>Email</h5>
                <h4><?php echo htmlspecialchars($_SESSION['email']); ?></h4>
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

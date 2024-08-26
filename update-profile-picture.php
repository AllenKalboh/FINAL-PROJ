<?php
session_start();
include('db.php');

// Fetch user data including the profile picture
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT profile_picture FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['profile_picture'] = $row['profile_picture'];
    }
    $stmt->close();
} else {
    die("User not logged in.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile Picture</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="profiles_page.css">
</head>
<body>
    <div class="sidebar">
        <a href="index.php"><i class="fas fa-home" style="font-size: 24px;"></i><span>Home</span></a>
        <a href="orders.php"><i class="fas fa-box" style="font-size: 24px;"></i><span>Orders</span></a>
        <a href="shoping-cart.php"><i class="fas fa-shopping-cart" style="font-size: 24px;"></i><span>Your Cart</span></a>
        <a href="update-user.php"><i class="fas fa-user" style="font-size: 24px;"></i><span>Update account</span></a>
        <a href="update-profile-picture.php"><i class="fas fa-camera" style="font-size: 24px;"></i><span>Update Profile Picture</span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 24px;"></i><span>Logout</span></a>
    </div>

    <div class="content">
        <div class="container">
            <h1>Update Profile Picture</h1>
            <form action="upload-profile-picture.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profile_picture">Choose a new profile picture:</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            <div class="mt-3">
                <h2>Current Profile Picture</h2>
                <img src="<?php echo isset($_SESSION['profile_picture']) ? htmlspecialchars($_SESSION['profile_picture']) : 'images/default-profile.png'; ?>" alt="Current Profile Picture" class="img-fluid rounded-circle" style="max-width: 200px;">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    .img-fluid.rounded-circle {
        border-radius: 50%;
    }
</style>
</html>

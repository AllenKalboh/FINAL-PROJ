<?php
include ('db.php');
include ('session.php');


if(isset($_SESSION['username'])){

    $sql = "SELECT first_name, last_name, email, address FROM users WHERE username = '?'";
    $result = $conn->query($sql);
    

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $GLOBALS['first_name'] = $row['first_name'];
    $GLOBALS['last_name'] = $row['last_name'];
    $GLOBALS['address'] = $row['address'];
    $GLOBALS['email'] = $row['email'];
  }
}
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
    <link rel="stylesheet" href="admin_page.css">
</head>
<body>
    <div class="sidebar">
        <a href="dashboard.php"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="product_list.php"><i class="fas fa-box"></i><span>Products List</span></a>
        <a href="add_product.php"><i class="fas fa-plus"></i><span>Add Products</span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    </div>

    <div class="content">
        <div class="container">
            <div class="profile-header">
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <div class="ml-3">
                    <h1>SAIRON</h1>
                    <p>Admin</p>
                </div>
            </div>
            <div class="main-content">
                <div class="card">
                    <h3>Overview</h3>
                    <div class="stats">
                        <div>
                            <h4>124</h4>
                            <p>Users</p>
                        </div>
                        <div>
                            <h4>67</h4>
                            <p>Posts</p>
                        </div>
                        <div>
                            <h4>12</h4>
                            <p>Comments</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3>Recent Activity</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut turpis eros. Nullam vehicula, risus et dictum volutpat, leo velit facilisis turpis, vel ullamcorper leo arcu vel eros.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include 'db.php'; // Include your database connection file

// Determine the current page
$limit = 10; // Number of comments per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get the total number of comments
$total_query = "SELECT COUNT(*) as total_comments FROM feedbacks";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_comments = $total_row['total_comments'];

// Calculate total pages
$total_pages = ceil($total_comments / $limit);
$query = "SELECT users.username, users.profile_picture, users.email, feedbacks.userMessage 
        FROM users 
        JOIN feedbacks ON users.user_id = feedbacks.user_id
        LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL Admin - User Messages</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="user_message.css">
    <link rel="icon" type="image/png" href="images/icons/logoinvert.png"/>
</head>
<style>
        .sidebar a:hover {
    background-color: #575757;
}
    </style>
<body>
    <section class="sidebar">
        <img src="images/icons/logoinvert.png" alt="logosidebar" style="width:140px;">
        <a href="admin_page.php"><i class="fas fa-home"></i><span> Home</span></a>
        <a href="user_message.php"><i class="fas fa-envelope"></i><span> Messages</span></a>
        <a href="product_list.php"><i class="fas fa-list-ul"></i><span> Products List</span></a>
        <a href="add_product.php"><i class="fas fa-plus"></i><span> Add Products</span></a>
        <a href="admin_orders.php"><i class="fas fa-receipt"></i><span> Orders Status</span></a>
        <a href="user_list.php"><i class="fas fa-users"></i><span> User List</span></a>
        <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
    </section>

    <section class="usr-msgs">
        <div class="container-usr-msgs">
            <h3>Messages from users</h3>
            <div class="user-msg-box">
                <div class="user-messages">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="user-message-item">
                        <img src="<?php echo empty($row['profile_picture']) ? 'images/icons/icon-user.png' : $row['profile_picture']; ?>" alt="Profile Picture" class="profile-picture">
                        <div class="user-info">
                        <h5><?php echo $row['username']; ?></h5>
                        <p>Email: <?php echo $row['email']; ?></p>
                        <p>Message: <?php echo $row['userMessage']; ?></p>
                    </div>
                </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <!-- Pagination -->
            <div class="pagination">
                <?php if($page > 1): ?>
                    <a href="user_message.php?page=<?php echo $page - 1; ?>">&laquo; Previous</a>
                <?php endif; ?>

                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="user_message.php?page=<?php echo $i; ?>" class="<?php echo ($page == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if($page < $total_pages): ?>
                    <a href="user_message.php?page=<?php echo $page + 1; ?>">Next &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<style>
.user-message-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.profile-picture {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
}

.user-info {
    flex-grow: 1;
}

.user-info h5 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: bold;
}

.user-info p {
    margin: 0;
    font-size: 0.9rem;
}

/*-----boss update-----*/

.sidebar {
    position: fixed;
    width: 200px;
    height: 100%;
    background-color: #333;
    padding-top: 20px;
    color: white;
}

.sidebar a {
    display: block;
    padding: 10px 15px;
    color: white;
    text-decoration: none;
}

.sidebar a:hover {
    background-color: #575757;
}

/* Main content styles */
.usr-msgs {
    margin-left: 220px; /* Offset by sidebar width */
    padding: 20px;
}

.container-usr-msgs h3 {
    margin-bottom: 20px;
}

/* User message item styles */
.user-message-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.profile-picture {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
}

.user-info {
    flex-grow: 1;
}

.user-info h5 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: bold;
}

.user-info p {
    margin: 0;
    font-size: 0.9rem;
}

/* Responsive styles */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .usr-msgs {
        margin-left: 0;
    }

    .user-message-item {
        flex-direction: column;
        align-items: flex-start;
    }

    .profile-picture {
        margin-bottom: 10px;
    }
}

/* Pagination styles */
.pagination {
        margin-top: 20px;
    }

    .pagination a {
        margin: 0 5px;
        padding: 5px 10px;
        border: 1px solid #ddd;
        color: #333;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

</style>
</html>

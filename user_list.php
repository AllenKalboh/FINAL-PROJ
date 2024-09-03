<?php
include ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SL Admin - User Accounts</title>

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<<<<<<< Updated upstream
   <link rel="stylesheet" href="user_lists.css">
   

</head>
<style>

    
</style>
    <body>
    <div class="sidebar">
    <img src="images/inverted.png" alt="">
=======
   <link rel="stylesheet" href="user_list.css">
   <link rel="icon" type="image/png" href="images/icons/logoinvert.png"/>
</head>
<body>
<style>
    .sidebar {
    background-color: #232323;
}
.sidebar a:hover {
    background-color: #575757;
}
</style>
<div class="sidebar">
<img src="images/icons/logoinvert.png" alt="logosidebar" style="width:140px;">
>>>>>>> Stashed changes
        <a href="admin_page.php"><i class="fas fa-home"></i><span> Home</span></a>
        <a href="user_message.php"><i class="fas fa-envelope"></i><span> Messages</span></a>
        <a href="product_list.php"><i class="fas fa-list-ul"></i><span> Products List</span></a>
        <a href="add_product.php"><i class="fas fa-plus"></i><span> Add Products</span></a>
        <a href="admin_orders.php"><i class="fas fa-receipt"></i><span> Orders Status</span></a>
        <a href="user_list.php"><i class="fas fa-users"></i><span> User List</span></a>
        <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
    </div>


<section class="accounts">

   <h1 class="heading">User Accounts</h1>

   <div class="box-container">

   <?php
   // Assuming you have a MySQLi connection $conn already established

   // Check if delete request is set
   if (isset($_GET['delete'])) {
       $user_id = $_GET['delete'];

       // Prepare the SQL statement to delete the user
       $delete_account = $conn->prepare("DELETE FROM `users` WHERE `user_id` = ?");
       $delete_account->bind_param("i", $user_id);

       // Execute the query
       if ($delete_account->execute()) {
           // Redirect with a query parameter to indicate successful deletion
           header("Location: user_list.php?deleted=true");
           exit();
       } else {
           echo "<p>Error deleting account.</p>";
       }
   }

   // Prepare the SQL statement
   $select_accounts = $conn->prepare("SELECT * FROM `users`");

   // Execute the query
   $select_accounts->execute();

   // Get the result
   $result = $select_accounts->get_result();

   // Check if there are any rows
   if ($result->num_rows > 0) {
       while ($fetch_accounts = $result->fetch_assoc()) {
           // Output user information
           echo "<div class='user'>";
           echo "<p>ID: " . htmlspecialchars($fetch_accounts['user_id']) . "</p>";
           echo "<p>Username: " . htmlspecialchars($fetch_accounts['username']) . "</p>";
           echo "<p>Email: " . htmlspecialchars($fetch_accounts['email']) . "</p>";
           // Output the delete link
           echo "<a href='user_list.php?delete=" . urlencode($fetch_accounts['user_id']) . "' onclick=\"return confirm('Delete this account? The user-related information will also be deleted!')\" class='delete-btn'>Delete</a>";
           echo "</div>";
       }
   } else {
       echo "<p>No Users Found.</p>";
   }
   ?>

   </div>

</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
   // Check if URL contains 'deleted=true' parameter
   const urlParams = new URLSearchParams(window.location.search);
   if (urlParams.has('deleted')) {
       alert('The Account Has Been Deleted.');
   }
</script>

</body>
</html>

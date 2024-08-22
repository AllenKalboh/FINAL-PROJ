<?php
include ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Accounts</title>

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   
   <style>
       body {
           background-color: #f4f4f4;
           font-family: Arial, sans-serif;
       }
       .accounts {
           padding: 20px;
           max-width: 1200px;
           margin: 0 auto;
       }
       .heading {
           text-align: center;
           margin-bottom: 30px;
           color: #333;
           font-size: 2.5rem;
           font-weight: bold;
       }
       .box-container {
           display: flex;
           flex-wrap: wrap;
           gap: 20px;
           justify-content: center;
       }
       .user {
           background: #fff;
           border: 1px solid #ddd;
           border-radius: 8px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           padding: 20px;
           width: 300px;
           transition: transform 0.2s, box-shadow 0.2s;
       }
       .user:hover {
           transform: translateY(-5px);
           box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
       }
       .user p {
           margin: 0 0 10px;
           color: #555;
       }
       .delete-btn {
           display: inline-block;
           margin-top: 10px;
           padding: 8px 16px;
           background-color: #dc3545;
           color: #fff;
           border-radius: 4px;
           text-decoration: none;
           font-size: 0.9rem;
           transition: background-color 0.2s;
       }
       .delete-btn:hover {
           background-color: #c82333;
       }
   </style>
</head>
<center><body>

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

<?php

include('db.php');

session_start();

if(isset($_POST['update_payment'])){
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING); // Corrected variable

    $update_payment = $conn->prepare("UPDATE `orders` SET status = ? WHERE order_id = ?");
    $update_payment->execute([$status, $order_id]);

    $message[] = 'Payment Status Updated!';
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE order_id = ?");
    $delete_order->execute([$delete_id]);
    header('Location: admin_orders.php'); // Corrected redirect
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order Status</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="admin_orderss.css">
</head>
<body>
<div class="sidebar">
    <img src="images/inverted.png" alt="">
        <a href="admin_page.php"><i class="fas fa-home"></i><span> Home</span></a>
        <a href="user_message.php"><i class="fas fa-envelope"></i><span> Messages</span></a>
        <a href="product_list.php"><i class="fas fa-list-ul"></i><span> Products List</span></a>
        <a href="add_product.php"><i class="fas fa-plus"></i><span> Add Products</span></a>
        <a href="admin_orders.php"><i class="fas fa-receipt"></i><span> Orders</span></a>
        <a href="user_list.php"><i class="fas fa-users"></i><span> User List</span></a>
        <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
</div>

<center>
<section class="orders">

<h1 class="heading">Order Status</h1>

<div class="box-container">

   <?php
   // Prepare the SQL statement to include address and payment_method
   $select_orders = $conn->prepare("SELECT * FROM `orders`");

   // Execute the query
   $select_orders->execute();

   // Get the result
   $result = $select_orders->get_result();

   // Check if there are any rows
   if ($result->num_rows > 0) {
       while ($fetch_orders = $result->fetch_assoc()) {
   ?>
   <div class="box">
      <p>Order Id: <span><?= htmlspecialchars($fetch_orders['id']); ?></span></p>
      <p>Name: <span><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
      <p>Total Price: <span>₱<?= htmlspecialchars($fetch_orders['total_price']); ?></span></p>
      <p>Date Created:  <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
      <p>Status: <span><?= htmlspecialchars($fetch_orders['payment_status']); ?></span></p>
      <p>Address: <span><?= htmlspecialchars($fetch_orders['address']); ?></span></p> <!-- Added Address Field -->
      <!--
      <p>Payment Method: <span><?= htmlspecialchars($fetch_orders['payment_method']); ?></span></p> Added Payment Method Field
       -->
      <div class="flex-btn">
         <!-- Example buttons (for actual functionality, additional code needed) -->
         <a href="update_orders.php?id=<?= htmlspecialchars($fetch_orders['id']); ?>" class="option-btn">Update</a>
         <a href="admin_orders.php?delete=<?= htmlspecialchars($fetch_orders['id']); ?>" class="delete-btn" onclick="return confirm('Delete this order?');">Delete</a>
      </div>
   </div>
   <?php
       }
   } else {
       echo '<p class="empty">No Orders Placed Yet!</p>';
   }

   // Close the statement and connection
   $select_orders->close();
   $conn->close();
   ?>

</div>

</section>
</center>

</body>
</html>

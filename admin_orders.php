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
   <style>
       body {
           background-color: #f4f4f4;
           font-family: Arial, sans-serif;
       }
       .orders {
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
       .box {
           background: #fff;
           border: 1px solid #ddd;
           border-radius: 8px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           padding: 20px;
           width: 300px;
           transition: transform 0.2s, box-shadow 0.2s;
       }
       .box:hover {
           transform: translateY(-5px);
           box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
       }
       .box p {
           margin: 0 0 10px;
           color: #555;
       }
       .box span {
           font-weight: bold;
       }
       .option-btn, .delete-btn {
           display: inline-block;
           margin-top: 10px;
           padding: 8px 16px;
           border-radius: 4px;
           color: #fff;
           text-decoration: none;
           font-size: 0.9rem;
           transition: background-color 0.2s;
       }
       .option-btn {
           background-color: #007bff;
       }
       .option-btn:hover {
           background-color: #0056b3;
       }
       .delete-btn {
           background-color: #dc3545;
       }
       .delete-btn:hover {
           background-color: #c82333;
       }
       .empty {
           text-align: center;
           color: #777;
           font-size: 1.2rem;
       }
   </style>
</head>
<body>

<center><section class="orders">

<h1 class="heading">Order Status</h1>

<div class="box-container">

   <?php


   // Prepare the SQL statement
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
      <p>Order Id: <span><?= htmlspecialchars($fetch_orders['order_id']); ?></span></p>
      <p>Product Name: <span><?= htmlspecialchars($fetch_orders['product_name']); ?></span></p>
      <p>Total Price: <span>₱<?= htmlspecialchars($fetch_orders['total_price']); ?>/-</span></p>
      <p>Ordered Date: <span><?= htmlspecialchars($fetch_orders['order_date']); ?></span></p>
      <p>Status: <span><?= htmlspecialchars($fetch_orders['status']); ?></span></p>

      <div class="flex-btn">
         <!-- Example buttons (for actual functionality, additional code needed) -->
         <a href="update_orders.php?id=<?= htmlspecialchars($fetch_orders['order_id']); ?>" class="option-btn">Update</a>
         <a href="admin_orders.php?delete=<?= htmlspecialchars($fetch_orders['order_id']); ?>" class="delete-btn" onclick="return confirm('Delete this order?');">Delete</a>
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

</body>
</html>

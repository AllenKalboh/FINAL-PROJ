<?php
include ('db.php')
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

<section class="orders">

<h1 class="heading">Order Status</h1>

<div class="box-container">

   <?php


   // Update order status if form is submitted
   if (isset($_POST['update_status'])) {
       $order_id = $_POST['order_id'];
       $new_status = $_POST['status'];

       // Prepare the SQL statement to update the status
       $update_status = $conn->prepare("UPDATE `orders` SET `status` = ? WHERE `order_id` = ?");
       $update_status->bind_param("si", $new_status, $order_id);

       // Execute the query
       if ($update_status->execute()) {
           echo "<p>Status updated successfully.</p>";
       } else {
           echo "<p>Error updating status.</p>";
       }

       // Close the statement
       $update_status->close();
   }

   // Prepare the SQL statement to fetch orders
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

      <!-- Update form -->
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= htmlspecialchars($fetch_orders['order_id']); ?>">
         <select name="status" required>
            <option value="Shipping" <?= $fetch_orders['status'] == 'To Ship' ? 'selected' : ''; ?>>Ship</option>
            <option value="Processing" <?= $fetch_orders['status'] == 'To Recieve' ? 'selected' : ''; ?>>Recieve</option>
            <option value="Completed" <?= $fetch_orders['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
            <option value="Cancelled" <?= $fetch_orders['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
         </select>
         <button type="submit" name="update_status" class="option-btn">Update Status</button>
      </form>

      <!-- Delete button (optional) -->
   </div>
   <?php
       }
   } else {
       echo '<p class="empty">No orders placed yet!</p>';
   }

   // Close the statement and connection
   $select_orders->close();
   $conn->close();
   ?>

</div>

</section>

</body>
</html>

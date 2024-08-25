<?php
include('db.php');
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
   <link rel="stylesheet" href="update_orders.css">
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

<section class="orders">

<h1 class="heading">Order Status</h1>

<div class="box-container">

   <?php
   // Update order status if form is submitted
   if (isset($_POST['update_status'])) {
       $order_id = $_POST['order_id'];
       $new_status = $_POST['status'];

       // Prepare the SQL statement to update the status
       $update_status = $conn->prepare("UPDATE `orders` SET `payment_status` = ? WHERE `id` = ?");
       $update_status->bind_param("si", $new_status, $order_id);

       // Execute the query
       if ($update_status->execute()) {
            echo "
            <div id='updateMessage' style='position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 50%; padding: 10px; background-color: black; color: white; border-bottom: 1px solid #ccc; text-align: center; font-size: 24px; transition: opacity 1s ease; margin-top: 20px;'>
                Order Updated Successfully
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('updateMessage').style.opacity = '0';
                }, 1000); // Wait for 1 second before starting the fade out
            
                setTimeout(function() {
                    document.getElementById('updateMessage').style.display = 'none';
                }, 2000); // Ensure it's fully hidden after the fade out completes
            </script>";
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
      <p>Order Id: <span><?= htmlspecialchars($fetch_orders['id']); ?></span></p>
      <p>Product Name:<span><?= htmlspecialchars($fetch_orders['product_names']); ?></span></p>
      <p>User Name: <span><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
      <p>Total Price: <span>₱<?= htmlspecialchars($fetch_orders['total_price']); ?></span></p>
      <p>Ordered Date: <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
      <p>Status: <span><?= htmlspecialchars($fetch_orders['payment_status']); ?></span></p>
      <p>Address: <span><?= htmlspecialchars($fetch_orders['address']); ?></span></p> <!-- Added Address Field -->
      <p>Payment Method: <span><?= htmlspecialchars($fetch_orders['method']); ?></span></p> <!-- Added Payment Method Field -->

      <!-- Update form -->
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= htmlspecialchars($fetch_orders['id']); ?>">
         <select name="status" required>
            <option value="Pending" <?= $fetch_orders['payment_status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="Shipping" <?= $fetch_orders['payment_status'] == 'Shipping' ? 'selected' : ''; ?>>Shipping</option>
            <option value="Processing" <?= $fetch_orders['payment_status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
            <option value="Completed" <?= $fetch_orders['payment_status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
            <option value="Cancelled" <?= $fetch_orders['payment_status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
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

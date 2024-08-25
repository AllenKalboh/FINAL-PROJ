<?php

include('db.php'); // Ensure this file contains the MySQLi connection setup

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   


<section class="orders">

   <h1 class="heading">Placed Orders</h1>

   <div class="box-container">

   <?php
      if ($user_id == '') {
         echo '<p class="empty">Please login to see your orders</p>';
      } else {
         // Prepare and execute the query
         $sql = "SELECT * FROM `orders` WHERE user_id = ?";
         if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
               while ($fetch_orders = $result->fetch_assoc()) {
   ?>
   <div class="box">
      <p>Placed on: <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
      <p>Name: <span><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
      <p>Email: <span><?= htmlspecialchars($fetch_orders['email']); ?></span></p>
      <p>Phone Number: <span><?= htmlspecialchars($fetch_orders['number']); ?></span></p>
      <p>Address: <span><?= htmlspecialchars($fetch_orders['address']); ?></span></p>
      <p>Payment Method: <span><?= htmlspecialchars($fetch_orders['method']); ?></span></p>
      <p>Your orders: <span><?= htmlspecialchars($fetch_orders['total_products']); ?></span></p>
      <p>Total price: <span>₱<?= htmlspecialchars($fetch_orders['total_price']); ?></span></p>
      <p>Payment status: <span style="color:<?= ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>"><?= htmlspecialchars($fetch_orders['payment_status']); ?></span></p>
   </div>
   <?php
               }
            } else {
               echo '<p class="empty">No orders placed yet!</p>';
            }
            $stmt->close();
         } else {
            echo '<p class="error">Error preparing statement</p>';
         }
      }
   ?>

   </div>

</section>

<script src="js/script.js"></script>

</body>
</html>

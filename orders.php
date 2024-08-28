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
   <link rel="icon" type="image/png" href="images/inverted.png"/>
   <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="orderss.css">


</head>
<body>
<style>
   *{
      text-decoration: none;
   }
   .place-order-btn {
    background-color: black; /* Default background color */
    color: white;            /* Default text color */
    border: none;            /* Remove default border */
    padding: 10px 20px;      /* Add padding */
    font-size: 16px;         /* Set font size */
    text-transform: uppercase; /* Uppercase text */
    cursor: pointer;         /* Pointer cursor on hover */
    transition: background-color 0.3s, transform 0.3s; /* Smooth transition */
    border-radius: 5px;      /* Rounded corners */
   width: 50%;
}

/* Hover state */
.place-order-btn:hover {
    background-color: #333; /* Slightly lighter color on hover */
    transform: scale(1.05); /* Slightly scale up the button */
}

/* Disabled state */
.place-order-btn.disabled {
    background-color: #ccc; /* Gray background for disabled */
    color: #666;            /* Gray text for disabled */
    cursor: not-allowed;    /* Change cursor to indicate disabled state */
    opacity: 0.6;           /* Make button look less active */
}

</style>
<!-- Header -->
<header class="header-v4">
   <!-- Header desktop -->
   <div class="container-menu-desktop">
      <div class="top-bar">
         <div class="content-topbar flex-sb-m h-full container">
            <div class="left-top-bar">
               Free shipping for standard order over ₱500
               </div>
               <div class="right-top-bar flex-w h-full">
                  <a href="#" class="flex-c-m trans-04 p-lr-25">Help & FAQs</a>
                  <a href="profilepage.php" class="flex-c-m trans-04 p-lr-25">My Account</a>
               </div>
         </div>
      </div>
      <div class="wrap-menu-desktop how-shadow1">
         <nav class="limiter-menu-desktop container">
            <a href="index.php" class="logo">
               <img src="images/logoshet.png" alt="Logo">
            </a>
            <div class="menu-desktop">
               <ul class="main-menu">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="product.php">Shop</a></li>
                  <li><a href="about.php">About</a></li>
               </ul>
            </div>
            <div class="cancel-box" style="margin-left: 700px; margin-top: 10px;">
               <ul>
                  <li class="cancelled"><a href="cancelled-orders.php" style="color: #333;">Cancelled Orders</a></li>
               </ul>
            </div>
         </nav>
      </div>
   </div>
   <!-- Header Mobile -->
   <div class="wrap-header-mobile">
      <div class="logo-mobile">
         <a href="index.php"><img src="images/logoshet.png" alt="Logo"></a>
      </div>
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
         <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
         </div>
         <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
            <a href="shoping-cart.php" style="color:black;">
               <i class="zmdi zmdi-shopping-cart"></i>
            </a>
         </div>
      </div>
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
         <span class="hamburger-box"></span>
         <span class="hamburger-inner"></span>
      </div>
   </div>
   <!-- Menu Mobile -->
   <div class="menu-mobile">
      <ul class="topbar-mobile">
         <li><div class="left-top-bar">Free shipping for standard order over ₱500</div></li>
         <li>
            <div class="right-top-bar flex-w h-full">
               <a href="#" class="flex-c-m p-lr-10 trans-04">Help & FAQs</a>
               <a href="#" class="flex-c-m p-lr-10 trans-04">My Account</a>
               <a href="logout.php" class="flex-c-m p-lr-10 trans-04">Log Out</a>
            </div>
         </li>
      </ul>
      <ul class="main-menu-m">
         <li><a href="index.php">Home</a></li>
         <li><a href="product.php">Shop</a></li>
         <li><a href="about.php">About</a></li>
      </ul>
   </div>


<section class="order">
   <h1 class="heading text-center my-2">Placed Orders</h1>
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
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="box border">
                  <p class="fw-bold">Placed on: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
                  <p class="fw-bold">Name: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
                  <p class="fw-bold">Email: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['email']); ?></span></p>
                  <p class="fw-bold">Phone Number: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['number']); ?></span></p>
                  <p class="fw-bold">Address: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['address']); ?></span></p>
                  <p class="fw-bold">Payment Method: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['method']); ?></span></p>
                  <p class="fw-bold">Your orders: <span class="fw-normal"><?= htmlspecialchars($fetch_orders['product_names']); ?>,</span></p>
                  <p class="fw-bold">Total price: <span class="fw-normal">₱<?= htmlspecialchars($fetch_orders['total_price']); ?></span></p>
                  <p class="fw-bold">Payment status: <span class="fw-normal" style="color:<?= ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>"><?= htmlspecialchars($fetch_orders['payment_status']); ?></span></p>
                  
                  <form method="post" action="cancel_process.php">
                     <input type="hidden" name="order_id" value="<?= htmlspecialchars($fetch_orders['id']); ?>">
                     <button type="submit" class="btn btn-outline-danger btn-sm ms-5 fw-bolder">Cancel Order</button>
                  </form>



                  <p>---------------------------------</p>
               </div>
            </div>
         </div>
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

<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
								Masks
							</a>
						</li>

						<li class="p-b-10">
							<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
								Toner
							</a>
						</li>

						<li class="p-b-10">
							<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
								Cleanser
							</a>
						</li>

						<li class="p-b-10">
							<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
								Moisturizer
							</a>
						</li>

						<li class="p-b-10">
							<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
								Sunscreen
							</a>
						</li>

						<li class="p-b-10">
							<a href="product.php" class="stext-107 cl7 hov-cl1 trans-04">
								Cleanser
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								
							</a>
						</li>

						<li class="p-b-10">
							<a href="helpfaq.html" class="stext-107 cl7 hov-cl1 trans-04" target=_blank>
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						mail us at skinline@gmail.com
					</p>

					<div class="social-icons">
      <a href="#" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
            <i class="fab fa-facebook-f"></i>
      </a>

      <a href="#" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
            <i class="fab fa-twitter"></i>
      </a>

      <a href="#" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
            <i class="fab fa-google-plus-g"></i>
      </a>
   </div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					
					<form>
						<!-- <div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div> -->

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Follow Us
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					
				<a href="images/icons/gcass.jfif" class="m-all-1" target="_blank">
   <img src="images/icons/gcash.png" alt="ICON-PAY">
</a>


				
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<script>document.write(new Date().getFullYear());</script> All rights reserved |Made with <a href="https://www.youtube.com/watch?v=iVIS6KIQx78" target="_blank">Group 2</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>
   <!-- Back to top -->
   <div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
   <!-- JS Scripts -->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <script src="vendor/animsition/js/animsition.min.js"></script>
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="vendor/select2/select2.min.js"></script>
   <script src="vendor/sweetalert/sweetalert.min.js"></script>
   <script src="js/main.js"></script>





</body>
</html>

<?php
include('db.php');
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$message = [];
$total_products = 0;
$total_price = 0;
$grand_total = 0;

// Fetch cart items
$cart_items = [];
$product_ids = []; // Array to store product IDs
$sql = "SELECT * FROM `cart` WHERE user_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cart_items[] = $row;
            $total_products += $row['quantity'];
            $total_price += $row['price'] * $row['quantity'];
            $product_ids[] = $row['product_id']; // Collect product IDs
        }
        $grand_total = $total_price;

        // Limit to the first 2 product IDs
        $product_ids = array_slice($product_ids, 0, 2);
    } else {
        $message[] = 'Your cart is empty.';
    }
    $stmt->close();
} else {
    $message[] = 'Failed to check cart.';
}

// Convert product_ids array to a comma-separated string
$product_ids_string = implode(',', $product_ids);

// Handle order placement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $method = filter_var($_POST['method'], FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_var($_POST['street'], FILTER_SANITIZE_SPECIAL_CHARS) . ', ' .
                filter_var($_POST['city'], FILTER_SANITIZE_SPECIAL_CHARS) . ', ' .
                filter_var($_POST['pin_code'], FILTER_SANITIZE_SPECIAL_CHARS);

    $product_names = isset($_SESSION['product_names']) ? $_SESSION['product_names'] : '';

    if ($total_products > 0) {
        // Insert order into the database
        $insert_order = $conn->prepare("INSERT INTO `orders` (user_id, name, number, email, method, address, product_names, product_ids, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($insert_order) {
            $insert_order->bind_param("issssssis", $user_id, $name, $number, $email, $method, $address, $product_names, $product_ids_string, $total_price);
            $insert_order->execute();

            // Check if the order was inserted successfully
            if ($insert_order->affected_rows > 0) {
                // Delete cart items after successful order placement
                $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
                if ($delete_cart) {
                    $delete_cart->bind_param("i", $user_id);
                    $delete_cart->execute();
                    $delete_cart->close();
                } else {
                    $message[] = 'Failed to clear cart.';
                }

                $message[] = 'Order placed successfully!';

// Output JavaScript for message display and redirection
echo "<script>
        alert('Order placed successfully!');
        setTimeout(function() {
            window.location.href = 'orders.php';
        }, 500); // Redirect after 1 second
      </script>";
                $_SESSION['grand_total'] = 0; // Reset grand total after placing the order
                unset($_SESSION['product_names']); // Clear product names from session
            } else {
                $message[] = 'Failed to place the order.';
            }
            $insert_order->close();
        } else {
            $message[] = 'Failed to prepare order statement.';
        }
    } else {
        $message[] = 'Your cart is empty.';
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/logoinvert.png"/>
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
	<link rel="stylesheet" href="user_orders.css">
</head>
<style>
.notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            display: none; /* Hidden by default */
            z-index: 1000; /* Ensure it is above other content */
}


/* General styling for the button */
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
<body class="animsition">
<?php if (!empty($message)): ?>
        <div id="notification" class="notification"><?php echo implode('<br>', $message); ?></div>
    <?php endif; ?>

    <script>
        // Show notification and hide after 2 seconds
        document.addEventListener("DOMContentLoaded", function() {
            var notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'block'; // Show the notification
                setTimeout(function() {
                    notification.style.opacity = 0; // Fade out
                    setTimeout(function() {
                        notification.style.display = 'none'; // Hide the notification
                    }, 500); // Allow time for fade out effect
                }, 2000); // Display for 2 seconds
            }
        });
    </script>
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
<!-- Logo desktop -->		
<a href="index.php" class="logo">
						<img src="images/icons/logoo.png" alt="IMG-LOGO">
					</a>
					<a href="index.php" class="logo">
						<img src="images/icons/log.png" alt="IMG-LOGO">
					</a>
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="product.php">Shop</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="tutorial.php">SkinHub</a></li>
							<li><a href="contact.php">Contact</a></li>
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
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">Free shipping for standard order over ₱500</div>
                </li>
                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">Help & FAQs</a>
                        <a href="#" class="flex-c-m p-lr-10 trans-04">My Account</a>
                        <a href="#" class="flex-c-m p-lr-10 trans-04">Log Out</a>
                    </div>
                </li>
            </ul>
            <ul class="main-menu-m">
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </header>
    <!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-items">
                        <h4>Your Products</h4>
                        <table class="table-shopping-cart">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cart_items)) : ?>
                                    <?php foreach ($cart_items as $item) : ?>
                                        <tr>
                                            <td>
                                                <?= htmlspecialchars($item['product_name']) ?>, x<?= htmlspecialchars($item['quantity']) ?> - ₱<?= number_format($item['price'], 2) ?>
                                            </td>
                                            <td>₱<?= number_format($item['price'], 2) ?></td>
                                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                                            <td>₱<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center"><?= implode('<br>', $message) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Order Summary -->
                    <form method="POST" action="">
                        <div class="order-summary">
                            <div class="summary-section billing-info">
                                <h4>Billing Information</h4>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">Phone Number</label>
                                    <input type="text"  required pattern="[0-9]{11}" maxlength=11 id="number" name="number" placeholder="Your phone number" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="method">Payment Method</label>
                                    <select id="method" name="method" required>
                                        <option value="cash">Cash on Delivery</option>
                                        <option value="credit">Credit Card</option>
                                        <!-- Add more payment methods as needed -->
                                    </select>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="street">Street</label>
                                    <input type="text" id="street" name="street" placeholder="Street" required>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" placeholder="City" required>
                                </div>
                                    
                                
                                <div class="form-group">
                                    <label for="pin_code">Postal Code</label>
                                    <input type="text" id="pin_code" name="pin_code" placeholder="Postal Code" required>
                                </div>
                            </div>
                            <div class="summary-section shipping-info">
                                <h4>Shipping Information</h4>
                                <!-- Assuming Shipping Information is same as Billing Information -->
                                <div class="form-group">
                                    <label for="shipping-address">Shipping Address</label>
                                    <input type="text" id="shipping-address" name="shipping-address" placeholder="Shipping address" required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping-city">Shipping City</label>
                                    <input type="text" id="shipping-city" name="shipping-city" placeholder="Shipping city" required>
                                </div>
                                <div class="form-group">
                                    <label for="shipping-zip">Shipping Zip Code</label>
                                    <input type="text" id="shipping-zip" name="shipping-zip" placeholder="Shipping zip code" required>
                                </div>
                                <p>Total Products: <?= htmlspecialchars($total_products) ?></p>
                                <p>Total Price: ₱<?= number_format($grand_total, 2) ?></p>
                                <input type="submit" name="order" class="place-order-btn <?= ($total_price > 1) ? '' : 'disabled'; ?>" value="Place Order" style="background-color: black; color: white; cursor: pointer;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
	<footer class="bg3 p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 text-justify">
					<h4 class="stext-301 cl0 p-b-10">
						SKINLINE
					</h4>

					<ul>
						<li class="p-b-10">
							<a class="stext-107  text-secondary cl7 hov-cl1 trans-04 ">
							Nurturing Your Skin, One Line at a Time, Discover Endless Possibilities with Skinline
							</s>
						</li>

						<li class="p-b-10">
							<a class="stext-107  text-secondary cl7 hov-cl1 trans-04 ">
							"At Skinline, we’re dedicated to nurturing your skin with the finest products and expert advice. Explore endless skincare possibilities as we guide you toward healthier, more radiant skin. Your journey to beauty and wellness starts here."
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 ">
					<h4 class="stext-301 cl0 p-b-10">
						Help & Faqs
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="tutorial.php" class="stext-107  cl7 hov-cl1 trans-04">
								SkinHub
							</a>
						</li>

						<li class="p-b-10">
							<a href="contact.php" class="stext-107 cl7 hov-cl1 trans-04">
								Technical Issues
							</a>
						</li>

						<li class="p-b-10">
							<a href="about.php" class="stext-107 cl7 hov-cl1 trans-04">
								Know more about our product
							</a>
						</li>

						<li class="p-b-10">
							<a href="about.php#section2" class="stext-107 cl7 hov-cl1 trans-04">
								Our Developers
							</a>
						</li>

						<li class="p-b-10">
							<a href="Helpfaqs.php" class="stext-107 cl7 hov-cl1 trans-04" >
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 ">
					<h4 class="stext-301 cl0 p-b-10">
						Get in Touch
					</h4>

					<ul>
					<li class="p-b-10">
							<a href="contact.php" class="stext-107 cl7 hov-cl1 trans-04">
								Reach to us
							</a>
						</li>

						<li class="p-b-10">
							<a class="stext-107 cl7 text-secondary hov-cl1 trans-04"> 
								# 09925424712
							</a>
						</li>

					<li class="p-b-10">
							<a class="stext-107 text-secondary cl7 hov-cl1 trans-04">
							Monday to Friday: 07:00 - 21:00

							</a>
						</li>

						
                        <li class="p-b-10">
							<a class="stext-107 cl7 hov-cl1 trans-04" style="color: #ababab">
							Follow Us 
							</a>
                            </ul>

					<div class="social-icons">
        <a href="https://www.facebook.com/profile.php?id=61564942100112" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="https://www.tiktok.com/@skinline.est2024?_t=8pC3gPTHrX7&_r=1" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
		<i class="fa-brands fa-tiktok"></i>
        </a>

        <a href="mailto:skinlineest2024@gmail.com" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
           <i class="fa-solid fa-envelope"></i>
        </a>
		
		<a href="https://www.instagram.com/skinline.est2024?igsh=d2Y5bGgwZ3RsZXo0" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
		<i class="fa-brands fa-instagram"></i>
		</a>

		<a href="https://www.youtube.com/@SkinLineest2024" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
		<i class="fa-brands fa-youtube"></i>
        </a>
		
    </div>
				</div>
				

				<div class="col-sm-6 col-lg-3 ">
				
					<h4 class="stext-301 cl0 p-b-10">
						Policy
					</h4>

					<ul>
					<li class="p-b-10">
							<a href="refund.php" class="stext-107 cl7 hov-cl1 trans-04">
								Refund Policy
							</a>
						</li>
					<li class="p-b-10">
							<a href="privacy.php" class="stext-107 cl7 hov-cl1 trans-04">
								Privacy Policy
							</a>
						</li>

						<li class="p-b-44">
							<a href="termsofservice.php" class="stext-107 cl7 hov-cl1 trans-04">
								Terms of Service
							</a>

						
                            <li class="p-b-10">
                            <a href="https://maps.app.goo.gl/D8WoExssGoSUVhs29" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 stext-112 m-t-40 cl7 size-201 p-b-20" style="color: #ababab;">
                            <i class="fa-solid fa-location-pin"> </i>
                            Trece Martires, Cavite 
                            </a>    
							 
							
					
						</li>
						</ul>
					</div>
					</div>
					<form>
						<!-- <div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div> -->

						<!-- <div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Follow Us
							</button>
						</div> -->
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
<script>document.write(new Date().getFullYear());</script> All rights reserved |Made with <a href="https://www.youtube.com/watch?v=iVIS6KIQx78" target="_blank" style="text-decoration: none; color: white;">Group 2</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>
	<script src="https://kit.fontawesome.com/b8a0ff877f.js" crossorigin="anonymous"></script>
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

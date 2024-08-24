<?php
include ('db.php');
include ('session.php');
include ('session-checker.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/inverted.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<style>
/* Ensure the main wrapper takes full height */
.main-wrapper {
    max-height: 100vh; /* Changed from max-height to min-height */
    display: flex;
    flex-direction: column;
}

/* Footer styling */
footer {
    background-color: #f1f1f1; /* Adjust as needed */
    padding: 75px 0 32px;
    margin-top: 200px; /* Push footer to the bottom */
}

.cart-section {
    padding: 20px;
    max-width: 95%;
    margin: auto;
    font-family: Arial, sans-serif;
}

.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.cart-table th, .cart-table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
	border: solid black 1px;
}

.cart-table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.cart-table tr:hover {
    background-color: #f9f9f9;
}

.cart-table td a {
    text-decoration: none;
    color: #e74c3c;
}

.cart-table td a:hover {
    text-decoration: underline;
}

.checkout-button-container {
    text-align: right;
}

.checkout-button {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.checkout-button:hover {
    background-color: gray;
}
.bold {
    font-weight: bold;
}

/* If you want to ensure that the strong tag is always bold */
.bold strong {
    font-weight: bold;
}


</style>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over ₱500
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="profilepage.php" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						
					</div>
				</div>
			</div>
			

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/logoshet.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							
						</ul>
					</div>	
					<!---remove cart because were already at the cart site---->
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/logoshet.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
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

			<!-- Button show menu -->
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
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.php">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	 <!-- Shopping Cart Content -->
	  <!-- Shopping Cart Content -->
	  <section class="cart-section">
    <table class="cart-table">
        <thead>
            <tr>
                <th class="bold">Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('db.php');

            // Check if the user is logged in
            if (!isset($_SESSION['user_id'])) {
                echo '<tr><td colspan="6">Please log in to view your cart.</td></tr>';
                exit();
            }

            $user_id = $_SESSION['user_id'];
            $grand_total = 0;

            // Fetching cart items from the database for the logged-in user
            $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $cart_items = $stmt->get_result();

            if ($cart_items->num_rows > 0) {
                while ($item = $cart_items->fetch_assoc()) {
                    $total = $item['price'] * $item['quantity'];  // Calculating the total for each item
                    $grand_total += $total; // Accumulate the grand total
                    $imgPath = 'uploads/' . htmlspecialchars($item['img_01']); // Updated column name

                    // Debugging the image path
                    if (file_exists($imgPath)) {
                        $imgSrc = $imgPath;
                    } else {
                        $imgSrc = 'uploads/default.jpg'; // Fallback image
                    }
                    ?>
                    <tr>
                        <td class="bold"><?= htmlspecialchars($item['product_name']); ?></td>
                        <td>₱<?= htmlspecialchars(number_format($item['price'], 2)); ?></td>
                        <td><?= htmlspecialchars($item['quantity']); ?></td>
                        <td>₱<?= htmlspecialchars(number_format($total, 2)); ?></td>
                        <td><button class="dlt-btn"><a href="delete_from_cart.php?cart_id=<?= htmlspecialchars($item['id']); ?>">DELETE</a></button></td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="6">No items in the cart.</td></tr>';
            }

            $stmt->close();
            $conn->close();
            ?>
        </tbody>
        <!-- Grand Total Row -->
        <tfoot>
            <tr>
			<td colspan="3" style="border: none;"></td>

                <td class="bold"><strong>Grand Total: ₱ <?= htmlspecialchars(number_format($grand_total, 2)); ?></strong></td>
                <td class="bold"> </td>
            </tr>
        </tfoot>
    </table>

    <div class="checkout-button-container">
        <button class="checkout-button">Proceed to Checkout</button>
    </div>
</section>







		
	
		

	<!-- Footer -->
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
	</div>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
include ('db.php');
include ('session.php');
include ('session-checker.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skinline Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/logoinvert.png"/>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
	
}
.cart-table td {
	color: black;
}

.cart-table th {
    background-color: black;
    font-weight: bold;
	color: white;
	border: solid white 1px;
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
.quantity-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.quantity-input {
    width: 60px; /* Adjust width as needed */
    text-align: center; /* Center text in the input field */
    margin-right: 10px; /* Space between input and button */
}

.update-btn {
	width: 24px; /* Adjust the size as needed */
    height: 24px;
}

/* Optional: Add a hover effect for better UX */
.update-btn:hover {
    background-color: #45a049; /* Darker green */
}
.alert-success {
	position: fixed; 
    top: 18%; /* Adjusted to be higher on the page */
    left: 50%; 
    transform: translate(-50%, -50%); 
    padding: 10px 15px; /* Reduced padding for smaller width and height */
    background-color: #28a745; /* Green background */
    color: white; 
    text-align: center; 
    font-size: 18px; /* Reduced font size */
    font-weight: bold; /* Bold text */
    z-index: 1000; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    transition: opacity 1s ease;
    opacity: 1;
    display: none; /* Hidden by default */
    border-radius: 5px; /* Optional: rounded corners for a softer look */
        }

</style>
<body class="animsition">
	
<?php include ('header.php');?>
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
                <th>Remove Product</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div id='feedbackMessage' class='alert-success'>
                    Product quantity has been updated.
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var message = document.getElementById('feedbackMessage');
                        message.style.display = 'block'; // Show the alert

                        setTimeout(function() {
                            message.style.opacity = '0'; // Start fade-out
                        }, 2000); // Wait for 2 seconds before starting the fade-out

                        setTimeout(function() {
                            message.style.display = 'none'; // Hide the message after fade-out
                        }, 3000); // Ensure it's fully hidden 1 second after the fade-out completes
                    });
                </script>
            <?php endif;

            // Check if the user is logged in
            if (!isset($_SESSION['user_id'])) {
                echo '<tr><td colspan="5">Please log in to view your cart.</td></tr>';
                exit();
            }

            $user_id = $_SESSION['user_id'];
            $grand_total = 0;
            $product_names = []; // Array to accumulate product names

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

                    // Accumulate product names
                    $product_names[] = htmlspecialchars($item['product_name']);
                    ?>
                    <tr>
                        <td class="bold"><?= htmlspecialchars($item['product_name']); ?></td>
                        <td>₱<?= htmlspecialchars(number_format($item['price'], 2)); ?></td>
                        <td>
                            <div class="quantity-container">
                                <form action="update-cart.php" method="POST" style="display: flex; align-items: center; justify-content: center;">
                                    <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']); ?>" min="1" class="quantity-input"> <br>
                                    <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['id']); ?>">
                                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                        <i class="fas fa-pen-to-square update-icon"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>₱<?= htmlspecialchars(number_format($total, 2)); ?></td>
                        <td>
                            <button class="dlt-btn" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <a href="delete_from_cart.php?cart_id=<?= htmlspecialchars($item['id']); ?>" style="text-decoration: none; color: inherit;">
                                    <i class="fas fa-trash-alt"></i> <!-- Font Awesome trash icon -->
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="5">No items in the cart.</td></tr>';
            }

            $_SESSION['grand_total'] = $grand_total; // Store the grand total in session
            $_SESSION['product_names'] = implode(', ', $product_names); // Store the product names in session

            $stmt->close();
            $conn->close();
            ?>
        </tbody>
        <!-- Grand Total Row -->
        <tfoot>
            <tr>
                <td colspan="3" style="border: none;"></td>
                <td class="bold"><strong>Grand Total: ₱ <?= htmlspecialchars(number_format($grand_total, 2)); ?></strong></td>
                <td class="bold"></td>
            </tr>
        </tfoot>
    </table>
<style>
	/* Button Styling */
.btn {
    background-color: #333; /* Light black background */
    color: #fff; /* White text color */
    padding: 12px 24px; /* Padding for a comfortable click area */
    font-size: 1rem; /* Font size */
    border-radius: 30px; /* Rounded corners */
    text-decoration: none; /* Remove underline from links */
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effects */
    display: inline-block; /* Ensures the button behaves as a block element without affecting its position */
}

/* Hover Effect */
.btn:hover {
    background-color: #555; /* Hover to grey */
    transform: scale(1.05); /* Slightly enlarge the button */
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
}

/* Disabled State */
.disabled {
    pointer-events: none; /* Disable click */
    opacity: 0.6; /* Slightly faded */
}
</style>
    <div class="checkout-button-container">
        <a href="user_orders.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" style="color: white;">Proceed to Checkout</a>
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

						</ul>
					<p class="stext-107 cl7 size-201 p-b-10">
						Follow us
					</p>

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
							<a href="productuse.php" class="stext-107 cl7 hov-cl1 trans-04">
								Product Use Policy
							</a>
						</li>
					<li class="p-b-10">
							<a href="privacy.php" class="stext-107 cl7 hov-cl1 trans-04">
								Privacy Policy
							</a>
						</li>

						<li class="p-b-16">
							<a href="termsofservice.php" class="stext-107 cl7 hov-cl1 trans-04">
								Terms of Service
							</a>

							<a href="https://maps.app.goo.gl/D8WoExssGoSUVhs29" class="fs-24 cl3 hov-cl0 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8">
							<p class="stext-112 m-t-40 cl7 size-201 p-b-10"> <i class="fa-solid fa-location-pin"> </i> Trece Martires, Cavite </p> 
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
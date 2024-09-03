<?php
include('db.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

// Fetch completed orders for the logged-in user
$select_orders = $conn->prepare("SELECT id, product_ids, product_names, total_price, name, placed_on, payment_status, address, number FROM `orders` WHERE payment_status = 'Completed' AND user_id = ?");
$select_orders->bind_param("i", $user_id);
$select_orders->execute();
$result = $select_orders->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Skinline Orders Rating</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
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
    <link rel="stylesheet" href="to-rates.css">


</head>
<style>
  
</style> 
<!-- Header -->


<?php include ('header.php');?>
<body> 
<script>
		document.addEventListener('DOMContentLoaded', function() {
    const textEffects = document.querySelectorAll('.text-effect');

    textEffects.forEach(function(el) {
        setTimeout(function() {
            el.classList.add('active');
        }, 200); // Adjust the delay as needed
    });
});

function showContainer() {
    const container = document.querySelector('.orders-box-container');
    container.classList.add('visible');
}

// Example usage: call this function when you want to trigger the effect
window.onload = function() {
    showContainer(); // Show container when the page loads
};

	 </script>
<div class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/Banners/bannerbg1.png');">
    <h2 class="ltext-105 cl0 txt-center text-effect" data-effect="fade-down">
        Orders Rating
    </h2>
    <br>
    <p class="txt-white cl0 txt-center text-effect" data-effect="zoom-in">
        Rate your received products here!
    </p>
	</div>

    <section class="orders">
    <h1 class="heading"></h1>
    <div class="orders-box-container">
        <?php
        if ($result->num_rows > 0) {
            while ($fetch_orders = $result->fetch_assoc()) {
                $product_names = explode(',', $fetch_orders['product_names']);
                
                if (empty($product_names)) {
                    echo '<p class="empty">No products found for this order.</p>';
                    continue;
                }
        ?>
        <div class="box ">
            <p>Order Id: <span><?= htmlspecialchars($fetch_orders['id']); ?></span></p>
            <p>Total Price: <span>₱<?= htmlspecialchars($fetch_orders['total_price']); ?></span></p>
            <p>Name: <span><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
            <p>Date Created: <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
            <p>Status: <span><?= htmlspecialchars($fetch_orders['payment_status']); ?></span></p>
            <p>Address: <span><?= htmlspecialchars($fetch_orders['address']); ?></span></p>
            <p>Phone Number: <span><?= htmlspecialchars($fetch_orders['number']); ?></span></p>

            <h2 class="subheading">Rate Product/s</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product_names as $product_name) {
                        $product_name = trim($product_name);

                        // Query the product details by name
                        $product_query = $conn->prepare("SELECT id, product_name, price, img_01 FROM products WHERE product_name = ?");
                        $product_query->bind_param("s", $product_name);
                        $product_query->execute();
                        $product_result = $product_query->get_result();
                        
                        if ($product_result->num_rows > 0) {
                            $product = $product_result->fetch_assoc();
                            $imgPath = 'uploads/' . basename($product['img_01']); // Path to the product image
                    ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($imgPath); ?>" alt="Product Image" onclick="viewImage('<?= htmlspecialchars($imgPath); ?>')"></td>
                        <td><?= htmlspecialchars($product['product_name']); ?></td>
                        <td>₱<?= htmlspecialchars($product['price']); ?></td>
                        <td>
                            <button type="button" class="btn btn-primary open-modal-btn" data-product-id="<?= htmlspecialchars($product['id']); ?>" data-order-id="<?= htmlspecialchars($fetch_orders['id']); ?>">Rate</button>
                        </td>
                    </tr>
                    <?php
                        }
                        $product_query->close();
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="ratingModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Rate the Product</h2>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5" title="5 stars">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4" title="4 stars">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" title="3 stars">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2" title="2 stars">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1" title="1 star">&#9733;</label>
                </div>
                <button type="button" class="btn btn-primary" id="submitRatingBtn">Submit Rating</button>
            </div>
        </div>

        <div id="fullscreenImage" class="fullscreen-img" onclick="closeFullscreen()">
            <img id="fullscreenImg" src="" alt="Fullscreen Image">
        </div>

        <?php
            }
        } else {
            echo '<p class="empty">No Completed Orders Found!</p>';
        }
        $select_orders->close();
        $conn->close();
        ?>
    </div>
</section>


<script>
    // Get modal elements
    const modal = document.getElementById("ratingModal");
    const openModalBtns = document.querySelectorAll(".open-modal-btn");
    const closeModalBtn = document.querySelector(".close-btn");
    const submitRatingBtn = document.getElementById("submitRatingBtn");

    // Open modal and set product ID
    openModalBtns.forEach(button => {
        button.onclick = function() {
            const productId = this.getAttribute("data-product-id");
            const orderId = this.getAttribute("data-order-id");
            modal.setAttribute("data-product-id", productId);
            modal.setAttribute("data-order-id", orderId);
            modal.classList.add("show"); // Show with fade-in effect
        }
    });

    // Close modal
    closeModalBtn.onclick = function() {
        modal.classList.remove("show"); // Hide with fade-out effect
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.remove("show"); // Hide with fade-out effect
        }
    }

    // Handle star rating selection
    const stars = document.querySelectorAll(".star-rating input");
    stars.forEach(star => {
        star.addEventListener("change", function() {
            const rating = this.value;
            console.log("Selected rating:", rating); // For debugging
        });
    });

    // Handle submit rating button
    submitRatingBtn.onclick = function() {
        const selectedStar = document.querySelector(".star-rating input:checked");
        if (selectedStar) {
            const rating = selectedStar.value;
            const productId = modal.getAttribute("data-product-id");
            const orderId = modal.getAttribute("data-order-id");
            
            fetch('rate_product.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'order_id': orderId,
                    'product_id': productId,
                    'rating': rating
                })
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
                modal.classList.remove("show"); // Hide with fade-out effect after submission
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            alert("Please select a rating before submitting.");
        }
    }

 // Function to view image in larger mode (Picture-in-Picture effect)
/*function viewImage(src) {
    const fullscreenImg = document.getElementById("fullscreenImage");
    const fullscreenImgElement = document.getElementById("fullscreenImg");
    fullscreenImgElement.src = src;
    fullscreenImg.style.display = "flex";
}

// Function to close the fullscreen image
function closeFullscreen() {
    document.getElementById("fullscreenImage").style.display = "none";
}*/

</script>

<!--div id="fullscreenImage" class="fullscreen-image">
    <span class="close-fullscreen" onclick="closeFullscreen()">&times;</span>
    <img id="fullscreenImg" src="" alt="Fullscreen Image">
</div>-->




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
							<a href="productuse.php" class="stext-107 cl7 hov-cl1 trans-04">
								Product Use Policy
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

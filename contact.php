<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['first_name']) && isset($_POST['email']) && isset($_POST['msg'])) {
        // Check if the user is logged in
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
			echo "
            <div id='loginAlert' style='
                position: fixed; 
                top: 50%; 
                left: 50%; 
                transform: translate(-50%, -50%); 
                padding: 20px; 
                background-color: #d9534f; /* Red background */
                color: white; 
                border: 1px solid #c9302c; /* Darker red border */
                border-radius: 8px; /* Rounded corners */
                text-align: center; 
                font-size: 24px; 
                font-weight: bold; /* Bold text */
                z-index: 1000;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
                transition: opacity 1s ease;
            '>
                You must be logged in to submit feedback.
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.getElementById('loginAlert');
                    alert.style.opacity = '0'; // Start fade-out
                }, 1600); // Wait for 0.8 seconds before starting the fade-out

                setTimeout(function() {
                    var alert = document.getElementById('loginAlert');
                    alert.style.display = 'none'; // Hide the message after fade-out
                    window.location.href = 'login.php'; // Redirect to login page
                }, 1800); // Ensure it's fully hidden 1 second after the fade-out completes
            </script>";
        } else {
            // Retrieve user inputs
            $firstName = $_POST['first_name'];
            $userEmail = $_POST['email'];
            $userMessage = $_POST['msg'];

            // Retrieve user ID from session
            $userId = $_SESSION['user_id']; // Ensure user_id is set in session

            // Prepare and execute the SQL statement to insert the data
            $stmt = $conn->prepare("INSERT INTO feedbacks (first_name, userMessage, user_id, user_email) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssis", $firstName, $userMessage, $userId, $userEmail);

            if ($stmt->execute()) {
				echo "
				<div id='feedbackMessage' style='
					position: fixed; 
					top: 25%; /* Adjusted to be higher on the page */
					left: 50%; 
					transform: translate(-50%, -50%); 
					padding: 20px; 
					background-color: black; /* Green background */
					color: white; 
					text-align: center; 
					font-size: 24px; 
					font-weight: bold; /* Bold text */
					z-index: 1000; 
					box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
					transition: opacity 1s ease;
				'>
					Thank you for contacting us! Your message has been sent successfully.
				</div>
				<script>
					setTimeout(function() {
						var message = document.getElementById('feedbackMessage');
						message.style.opacity = '0'; // Start fade-out
					}, 2000); // Wait for 2 seconds before starting the fade-out
			
					setTimeout(function() {
						var message = document.getElementById('feedbackMessage');
						message.style.display = 'none'; // Hide the message after fade-out
					}, 3000); // Ensure it's fully hidden 1 second after the fade-out completes
				</script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    } else {
        echo "Error: Required fields are missing.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SkinLine Contact</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<style>

.mapa {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100%; /* Ensure container has a height for vertical centering */
	margin-top:50px;
}

.mapa img {
    width: 500px;
}

/* Center the button container */
.button-container {
    text-align: center; /* Center align the button */
    margin-top: 20px; /* Optional margin to add space above the button */
}

.minimalist-button {
    background: #fff; /* White background */
    border: 2px solid #000; /* Black border */
    color: #000; /* Black text color */
    padding: 10px 20px; /* Padding inside the button */
    font-size: 16px; /* Font size */
    font-family: 'Arial', sans-serif; /* Font family */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    transition: all 0.3s ease; /* Smooth transition for hover effects */
}

.minimalist-button:hover {
    background-color: #000; /* Black background on hover */
    color: #fff; /* White text color on hover */
}
	</style>
<body class="animsition">
	
		<!-- Header -->
		<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
		<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
					Welcome to Skinline, your ultimate destination for skincare solutions tailored to meet diverse needs.
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="Helpfaqs.php" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						<?php
							if (isset($_SESSION['username'])) {
							
						?>
						<a href="profilepage.php" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>
						<?php
						} else {
						?>
						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
						<?php
						}
						?>
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

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li >
								<a href="index.php">Home</a>
								
							</li>

							<li >
								<a href="product.php">Shop</a>
							</li>

							

							<li>
								<a href="about.php">About</a>
							</li>

							<li class="active-menu">
								<a href="tutorial.php">SkinHub</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>


							
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m" style="padding-right: 20px">
						
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart"
  					   onmouseover="this.querySelector('a').style.color='grey'"
     				   onmouseout="this.querySelector('a').style.color='black'">
                     <a href="shoping-cart.php" style="color: black; transition: color 0.3s ease;">
      				  <i class="zmdi zmdi-shopping-cart"></i>
  					  </a>
</div>

						
						</div>

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
							<i class="zmdi zmdi-user"></i>
						</a>

						<a href="search_page.php" class="sc-btn" style="font-size: 28px; padding-right: 20px; color: black; text-decoration: none;"
						   onmouseover="this.firstElementChild.style.color='grey';" 
   							onmouseout="this.firstElementChild.style.color='black';">
    					<i class="fas fa-search"></i> 
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logoo.png" alt="IMG-LOGO"></a>
			</div>
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/log.png" alt="IMG-LOGO" style="width: 50px; height: 50px;"></a>
			</div>


			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15" style="">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					
				</div>
				

				
				<a href="shoping-cart.php" style="color: black; font-size: 28px" ">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						<a href="search_page.php" class="sc-btn" style="font-size: 25px; padding-left: 15px; color: black;">
   								 <i class="fas fa-search"></i> 
							</a> 	
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
						
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="Helpfaqs.php" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="profilepage.php" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

					</div>
				</li>
			</ul>

			<ul class="main-menu-m" style="background-color: #1c1c1c;">
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
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="tutorial.php">SkinHub</a>
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

			</div>
		</div>
	</header>


	<!-- Title page -->
	<style>
		/* Common styles for the text effects */
.text-effect {
    display: inline-block;
    opacity: 0; /* Hidden initially */
    transition: all 1s ease; /* Smooth transition */
}

/* Fade Down Effect */
.text-effect[data-effect="fade-down"] {
    transform: translateY(-20px); /* Move up initially */
}

.text-effect[data-effect="fade-down"].active {
    opacity: 1; /* Fade in */
    transform: translateY(0); /* Move to original position */
}

/* Zoom In Effect */
.text-effect[data-effect="zoom-in"] {
    transform: scale(0.5); /* Shrink initially */
}

.text-effect[data-effect="zoom-in"].active {
    opacity: 1; /* Fade in */
    transform: scale(1); /* Zoom to original size */
}

	 </style>

	 <script>
		document.addEventListener('DOMContentLoaded', function() {
    const textEffects = document.querySelectorAll('.text-effect');

    textEffects.forEach(function(el) {
        setTimeout(function() {
            el.classList.add('active');
        }, 500); // Adjust the delay as needed
    });
});
	 </script>

	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/Banners/bannerbg1.png');">
    <h2 class="ltext-105 cl0 txt-center text-effect" data-effect="fade-down">
        Contact
    </h2>
    <br>
    <p class="txt-white cl0 txt-center text-effect" data-effect="zoom-in">
        Wherever you are, whenever you are contact us right here!
    </p>
</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-60">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form method="POST" action="">
    <h4 class="mtext-105 cl2 txt-center p-b-30">
        Send Us A Message
    </h4>

    <div class="bor8 m-b-20 how-pos4-parent" style="position: relative;">
    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="first_name" placeholder="Your First Name" required style="padding-left: 65px;">
    <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); width: 24px; height: 24px; margin-left: 18px;">
</div>


    <div class="bor8 m-b-20 how-pos4-parent">
        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address" required>
        <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
    </div>

    <div class="bor8 m-b-30">
        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?" required></textarea>
    </div>

    <div class="button-container">
        <button class="minimalist-button">
            Submit
        </button>
    </div>
</form>

				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Trece Martires, Cavite
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+63 994 907 9858
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								skinline@gmail.com
							</p>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <img src="images/Banners/map.jpg" alt="map" class="img-fluid">
        </div>
    </div>
</div>
		<style>
/* Additional styling if needed */
.img-fluid {
    max-width: 100%;
    height: auto;
}
    </style>
    



	</section>	
	
	
	<!-- Map -->
	


	<script src="https://kit.fontawesome.com/b8a0ff877f.js" crossorigin="anonymous"></script>
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
							</>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
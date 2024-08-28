<?php
include ('db.php');
include ('session.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Skinline</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="indexx.css">
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
<!--===============================================================================================-->
</head>
<body class="animsition">
	
<style>

/*events */
.banner-wrapper {
    position: relative;
    overflow: hidden;
    height: 400px;
}

.banner-slide {
    display: flex;
    flex-wrap: nowrap;
    transition: transform 0.5s ease-in-out;
}

.banner-image {
    min-width: 100%;
    transition: transform 0.5s ease;
}

.banner-wrapper:hover .banner-image {
    transform: scale(1);
}

.banner-wrapper:hover .banner-slide {
    animation: slideShow 5s infinite
}

@keyframes slideShow {
    0% { transform: translateX(0); }
    33.33% { transform: translateX(-100%); }
    66.66% { transform: translateX(-200%); }
    100% { transform: translateX(0); }
}
/*
.banner {
            width: 100%;
            padding-top: 100%; /* 1:1 Aspect Ratio 
            position: relative;
            overflow: hidden;
            perspective: 1200px;  Enhances 3D effect 
			border-radius: 15px;
        }
        .banner-inner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);  Smooth and realistic transition 
            transform-style: preserve-3d;  Allows 3D effects 
        }
        .banner:hover .banner-inner {
            transform: rotateY(180deg);  Flips the card 
        }
        .banner-face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;  Hides the back face when turned 
        }
		
        .banner-front, .banner-back {
            background-size: cover;
            background-position: center;
        }
        .banner-front {
            background-color: #ddd;
            Front image 
        }
        .banner-back {
            background-color: #ccc;
            transform: rotateY(180deg);  Rotates back face 
             Back image 
        }
		*/
/* video banners*/
.video-banner {
    background-color: #686D76;
    padding: 50px 0;
}

.video-container {
    display: flex;
    align-items: center;
    background-color: #393E46;
    padding: 20px;
    border-radius: 8px;
    height: 100%;
    max-height: 450px; /* Ensure consistent max height for all slides */
}

.video-wrapper {
    width: 100%;
    height: 250px; /* Ensure consistent height for all video containers */
    border: 2px solid #f0f0f0;
    border-radius: 8px;
    overflow: hidden;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.video-wrapper video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.text-container {
    flex: 1;
    margin-left: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}

.video-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #f0f0f0;
}

.video-description {
    font-size: 1rem;
    line-height: 1.6;
    color: #b0b0b0;
}

/* Slider Control Styling */
.carousel-control-prev,
.carousel-control-next {
    width: 5%; /* Adjust the width to be smaller */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #000;
    padding: 10px;
    border-radius: 50%;
}

.carousel-control-prev {
    left: -3%; /* Move the button to the far left edge */
}

.carousel-control-next {
    right: -3%; /* Move the button to the far right edge */
}

/* sa step skincare*/
.banner-container {
            background-image: url('images/bgindex/bgstep.png');
            background-size: cover;
            background-position: center;
            padding: 50px 20px 50px; /* Adjusted padding */
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-x: auto;
            white-space: nowrap;
        }
        .title-image {
            margin-bottom: 10px; /* Reduced margin */
            width: auto;
            max-width: 100%;
        }
        .step-container {
            text-align: center;
            width: 150px; /* Fixed width */
            height: 200px; /* Fixed height to create a vertically semi-rectangular shape */
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
            background-color: rgba(255, 255, 255, 0.9);
            margin: 0 10px; /* Add horizontal margin between steps */
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .step-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .step-image {
            width: 100%;
            height: 60%; /* Adjust height to fit within the step-container */
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .step-title {
            font-size: 1.25rem;
            margin-top: 10px;
            font-weight: bold;
        }
        .step-text {
            font-size: 1rem;
            color: #333;
            margin-top: 5px;
        }

		/* Media Queries for responsiveness */
/* Media Queries for responsiveness */
@media (max-width: 768px) {
    .step-container {
        width: 120px; /* Adjusted width for smaller screens */
        height: 250px; /* Adjusted height for smaller screens */
        margin-bottom: 20px; /* Added margin below each step */
    }
    .step-title {
        font-size: 1rem; /* Adjusted font size */
    }
    .step-text {
        font-size: 0.75rem; /* Adjusted font size */
    }
}

@media (max-width: 576px) {
    .banner-container {
        padding: 20px 5px; /* Reduced padding for smaller screens */
    }
    .step-container {
        width: 100px; /* Further adjusted width */
        height: 200px; /* Further adjusted height */
        margin-bottom: 20px; /* Added margin below each step */
    }
    .step-title {
        font-size: 0.875rem; /* Further adjusted font size */
    }
    .step-text {
        font-size: 0.625rem; /* Further adjusted font size */
    }
}


	/* saproductlines*/
.block1-txt {
    transition: background-color 0.3s ease, color 0.3s ease;
}

.block1-txt:hover {
    background-color: #252525cf; /* Hover background color */
    color: #ffffff; /* Hover text color */
}

.block1-name {
    color: #ffffffd1;
}

.block1  {
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}

/* Scaling effect and shadow on hover */
.block1:hover {
    transform: scale(1.05); /* Scale card up slightly */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Add shadow on hover */
}

/* Container for card images */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}

/* Scaling effect and shadow on hover */
.card:hover {
    transform: scale(1.05); /* Scale card up slightly */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Add shadow on hover */
}

/* Updated card image container */
.card-img-container {
    width: 100%; /* Use 100% width for full image display */
    height: auto; /* Maintain image aspect ratio */
    overflow: hidden;
    margin: 0 auto; /* Center the image within the card */
    display: flex;
    align-items: center;
    justify-content: center;
	cursor: pointer;
}

.best-seller-banner h2 {
    font-size: 2rem;
    font-weight: bold;
}

.rating span {
    font-size: 1.2rem;
}

/* sa ano ratings*/
.block2 {
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}

/* Scaling effect and shadow on hover */
.block2:hover {
    transform: scale(1.05); /* Scale card up slightly */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Add shadow on hover */
}

.block2{
	padding: 8px;
	border-radius: 10px;
	
}

/* sa ano to vegan free emerut*/
.servicon {
	filter: invert(0) grayscale(100%) brightness(0) contrast(100%);
    /* Adjust the filter values to get the desired color effect */
}
.value-card {
    padding: 20px;
	margin-bottom: 25px;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}

.value-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.value-card img {
    width: 60px;
    margin-bottom: 20px;
}

.value-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    }

.value-description {
    font-size: 1rem;
    color: #6c757d;
	text-align: justify;
}
.sc-btn {
    font-size: 32px;
    color: black; /* Initial color */
    text-decoration: none; /* Remove underline from links */
    padding: 10px 20px; /* Optional padding for better click area */
    display: inline-block; /* Ensure the button aligns properly */
    transition: color 0.3s ease; /* Smooth transition for color change */
}

.sc-btn:hover {
    color: rgb(107, 107, 107); /* Color on hover */
}

.sc-btn i {
    color: inherit; /* Make sure the icon inherits the color from .sc-btn */
}

/* Common styles for the text effects */
.text-effect {
    display: inline-block;
    opacity: 0; /* Hidden initially */
    transition: all 0.9s ease; /* Smooth transition */
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
	window.addEventListener('scroll', function() {
    const header = document.querySelector('.wrap-menu-desktop');
    header.classList.toggle('scrolled', window.scrollY > 50);
});

document.addEventListener('DOMContentLoaded', function() {
    const textEffects = document.querySelectorAll('.text-effect');

    textEffects.forEach(function(el) {
        setTimeout(function() {
            el.classList.add('active');
        }, 800); // Adjust the delay as needed
    });
});


</script>

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over ₱1,000
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="Helpfaqs.php" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

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

					

			<div class="wrap-menu-desktop">
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
							<li class="active-menu">
								<a href="index.php">Home</a>
								
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

					<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
						<a href="shoping-cart.php" style="color:black;">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
					</div>	
					</div>
		<!-- helpfaq.html -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logupp.png" alt="IMG-LOGO"></a>
			</div>
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/log.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10  js-show-cart">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

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
						Free shipping for standard order over ₱1,000
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

		

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/b3.png);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 text-dark cl2 respon2">
								Unveil Your Hidden Radiance, Redefine Boundaries
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 text-dark respon1">
								 2024 SKIN LINE ESSENTIALS
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg5 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/bgindex/bgprobio.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="500">
								<h2 class="ltext-201 text-light cl2 p-t-19 p-b-43 respon1">
									Normal Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1100">
								<span class="fs-20 text-white cl2 respon2 ">
								A well-balanced, feeling neither too oily nor too dry. It has a smooth texture, minimal shine, and even tone. To maintain this balance, use a gentle cleanser and a light moisturizer. Daily use of broad-spectrum sunscreen is essential to protect your skin from UV damage. Regular exfoliation helps keep the skin smooth and radiant.

								</span>
							</div>

						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/bgindex/bghya.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="500">
								<h2 class="ltext-201 cl2 text-light p-t-19 p-b-43 respon1">
									Dry Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1100">
								<span class="fs-20 text-white cl2 respon2 ">
								Often feels tight, rough, or flaky and may appear dull. To combat dryness, use a hydrating cleanser and apply a rich moisturizer to lock in moisture. Look for products with hyaluronic acid or glycerin. Avoid hot water and alcohol-based toners, opting instead for gentle, alcohol-free products.
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/bgindex/bgbright.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="500">
								<h2 class="ltext-201 text-light cl2 p-t-19 p-b-43 respon1">
									Sensitive Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1100">
								<span class="fs-20 text-white cl2 respon2 ">
								Is prone to redness, itching, and irritation from products or environmental factors. Choose fragrance-free and hypoallergenic products to minimize reactions. Use gentle, soothing ingredients like aloe vera or chamomile, and avoid applying multiple products at once. Always patch test new products.

								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/bgindex/bgcentella.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="500">
								<h2 class="ltext-201 cl2 text-light p-t-19 p-b-43 respon1">
									Combination Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1100">
								<span class="fs-20 text-white cl2 respon2 ">
								It features both oily and dry areas, typically oily in the T-zone and drier on the cheeks. To manage this, use a balanced cleanser and lightweight moisturizer. You might need different products for different areas of your face. Regular exfoliation helps keep oily areas clear and hydrates dry patches.

                               </span>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/bgindex/bgtea.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="500">
								<h2 class="ltext-201 text-light cl2 p-t-19 p-b-43 respon1">
									Oily Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1100">
								<span class="fs-20 text-white cl2 respon2 ">
								It appears shiny and greasy, with visible pores and a tendency for breakouts. Use a gel-based or foaming cleanser to control oil and apply an oil-free moisturizer to keep skin hydrated. Products with salicylic acid or benzoyl peroxide can help manage breakouts. Consider a mattifying primer or setting powder to reduce shine.

								</span>
							</div>
						</div>
					</div>
				</div>

				<!--end-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<section>



<!-- LAGAY TAYO DITO NG KAHIT SIGURO INFORMATIVE NA VECTORS -->
 
</section>
<div class="container mt-5">
        <div class="depota">
            <div class="row align-items-center mb-4">
                <div class="col text-effect" data-effect="fade-down">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
                <div class="col-auto text-effect" data-effect="zoom-in">
                    <h2 class="b1 text-center mb-0">Events & Promotions</h2>
                </div>
				
                <div class="col text-effect" data-effect="fade-down">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
            </div>
        </div>
<!-- Events n promotions -->
<div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="banner-wrapper">
                    <div class="banner-slide">
                        <img src="images/Banners/eventsb1.jpg" class="img-fluid banner-image" alt="Banner 1">
                        <img src="image2.jpg" class="img-fluid banner-image" alt="Banner 2">
                        <img src="image3.jpg" class="img-fluid banner-image" alt="Banner 3">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-wrapper">
                    <div class="banner-slide">
                        <img src="images/Banners/eventsb2.jpg" class="img-fluid banner-image" alt="Banner 4">
                        <img src="image5.jpg" class="img-fluid banner-image" alt="Banner 5">
                        <img src="image6.jpg" class="img-fluid banner-image" alt="Banner 6">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-wrapper">
                    <div class="banner-slide">
                        <img src="images/Banners/eventsb3.jpg" class="img-fluid banner-image" alt="Banner 7">
                        <img src="image8.jpg" class="img-fluid banner-image" alt="Banner 8">
                        <img src="image9.jpg" class="img-fluid banner-image" alt="Banner 9">
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>


		


<!-- guide Banner 
			
			<a href = "https://www.youtube.com/shorts/p68FLWb3LHw"> <div class="block1-link stext-101 cl2">
									Watch Guide
								</div> </a>-->
			</div>
			
	</div>
</div>

<div class="container-fluid video-banner  text-effect" data-effect="fade-down">
    <div class="container">
        <h2 class="text-center text-light mb-2">Video Gallery</h2>
		<p class="stext-113 text-center text-light cl6 p-b-26 mb-3"> Get to know more about skincare</p>
        <div id="videoReviewsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/vidd1.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Sunscreen Guide</div>
                                    <div class="video-description">
If your in the Philippines you need this sunscreen!                                    
</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/vidd2.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Fake Spf? Worry not</div>
                                    <div class="video-description">
                                        We offer 100% real spf, use it with confidence! 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/vidd3.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title"> Skincare? Yes!</div>
                                    <div class="video-description">
                                         Watch a simple skincare tutorial with  Ms. Micah Ella Fontanillas.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/i3.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Glowing Skin everyday thanks to this products!</div>
                                    <div class="video-description">
One of the perfect duos for hydration and protction, My secret to a radiant complexion                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/sk7.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Confused which ampoule to get?</div>
                                    <div class="video-description">
                                        Which among our ampoules is best for your skin? Here's a quick guide.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/vidd5.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Your ultimate guide to your skincare routine!</div>
                                    <div class="video-description">
                                      Cleanse, Prep, Hydrate, Restore, Repair & Protect!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

           <!--  Controls -->
            <a class="carousel-control-prev" href="#videoReviewsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#videoReviewsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>





<!-- Footer Banner -->
<div class="footban" style="text-align: center; margin-bottom: 35px; margin-top: 35px;">
		<img src="images/Banners/SkGuide.png" alt="fBanner" 
			style="width: 100%; max-width: 1200px; height: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" />
		
	</div>



	<!-- Banner -->
	<div class="sec-banner bg0 p-t-50 p-b-30">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5 text-effect" data-effect="zoom-in">
					Product Lines
				</h3>
				<br>
				<br>
			</div>
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w text-effect" data-effect="fade-down">
						<img src="images/bgindex/bgcentella.jpg" alt="IMG-BANNER">

						<a href="category.php?category=Centella" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									CENTELLA LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Soothing & Calming
								</span>

								<span class="block1-info text-white fs-10 mt-2 trans-04" >
								  FOR ALL SKIN TYPES THE OG
								</span>
							</div>
							
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w text-effect" data-effect="fade-down">
						<img src="images/bgindex/bghya.jpg" alt="IMG-BANNER">

						<a href="category.php?category=Hyalu" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									HYALU CICA LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Hydrating & Moisturizing
								</span>

								<span class="block1-info text-white fs-10 mt-2 trans-04" >
								  DRY SKIN? SAY NO MORE!
								</span>
							</div>
							
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w text-effect" data-effect="fade-down">
						<img src="images/bgindex/bgbright.jpg" alt="IMG-BANNER">
						
						<a href="category.php?category=Brightening" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									BRIGHTENING LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Glow & Brighten
								</span>

								<span class="block1-info text-white fs-10 mt-2 trans-04" >
								  ACHIEVE GLOWY SKIN
								</span>
							</div>
							
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w text-effect" data-effect="fade-down">
						<img src="images/bgindex/bgtea.jpg" alt="IMG-BANNER">

						<a href="category.php?category=TeaTrica" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									TEA TRICA LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Relieving & Soothing
								</span>

								<span class="block1-info text-white fs-10 mt-2 trans-04" >
								  FOR SENSITIVE SKIN & ACNE CARE
								</span>
							</div>
							
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w text-effect" data-effect="fade-down">
						<img src="images/bgindex/bgpore.jpg" alt="IMG-BANNER">

						<a href="category.php?category=PoreMizing" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									PORE MIZING LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Improving & Tightening
								</span>

								<span class="block1-info text-white fs-10 mt-2 trans-04" >
								  TO MINIMIZE PORES
								</span>
							</div>
							
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w text-effect" data-effect="fade-down">
						<img src="images/bgindex/bgprobio.jpg" alt="IMG-BANNER">

						<a href="category.php?category=ProbioCica" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									PROBIO CICA LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Repairing & Strengthening
								</span>

								<span class="block1-info text-white fs-10 mt-2 trans-04" >
								   ANTI AGING AND SKIN BARRIER CONCERNS
								</span>
							</div>
							
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<style>
	
	</style>
	 <!-- bestseller eme -->
	 <div class="container mt-5">
    <div class="best-seller-banner" style="border-bottom: 4px solid #000; margin-bottom: 20px;">
        <div class="depota">
            <div class="row align-items-center mb-4">
                <div class="col text-effect" data-effect="fade-down">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
                <div class="col-auto text-effect" data-effect="zoom-in">
                    <h2 class="b1 text-center mb-0">Best Sellers</h2>
                </div>
                <div class="col text-effect" data-effect="fade-down">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-img-container">
						<a href="product.php" target> 
                        <img src="01Product Lines Imgs/Centella Line/Oilcleanse/1723806918425.jpg" class="card-img" alt="SkinLine Centella Light Cleansing Oil">
						</a>
					</div>
                    <div class="card-body">
                        <h4 class="card-title">SkinLine Centella Light Cleansing Oil</h4>
                        <div class="rating d-flex justify-content-center align-items-center">
                            <span class="text-warning mr-2">
                                &#9733; &#9733; &#9733; &#9733; &#9733;
                            </span>
                            <span class="text-muted">(120 ratings)</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-img-container">
					<a href="product.php" target> 
                        <img src="01Product Lines Imgs/HyaCica Line/Hyalu Cica Water Fit Sun Serum 50ml 429/Picsart_24-08-20_17-19-23-347.jpg" class="card-img" alt="SkinLine Hyalu Cica Water Fit Sunscreen">
					</a>
					</div>
                    <div class="card-body">
                        <h4 class="card-title">SkinLine Hyalu Cica Water Fit Sunscreen</h4>
                        <div class="rating d-flex justify-content-center align-items-center">
                            <span class="text-warning mr-2">
                                &#9733; &#9733; &#9733; &#9733; &#9733;
                            </span>
                            <span class="text-muted">(98 ratings)</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-img-container">
					<a href="product.php" target> 
                        <img src="01Product Lines Imgs/Centella Line/Ampule cleanser/1723807243305.jpg" class="card-img" alt="SkinLine Centella Ampule Foam Gel Cleanser">
                   </a>
					</div>
                    <div class="card-body">
                        <h4 class="card-title">SkinLine Centella Ampule Foam Gel Cleanser</h4>
                        <div class="rating d-flex justify-content-center align-items-center">
                            <span class="text-warning mr-2">
                                &#9733; &#9733; &#9733; &#9733; &#9733;
                            </span>
                            <span class="text-muted">(87 ratings)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<br>
    </div>
</div>

<br>
<br>
	<!-- Product -->
	<section class="bg0 p-b-14">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Featured Products
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-2 how-active1" data-filter="*">
						All Products
					</button>

					

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".cleanser">
						Cleanser
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".ampoule">
						Ampoule
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".sunscreen">
						Sunscreen
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".toner">
						Toner
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					

				<a href="search_page.php" class="sc-btn" style="font-size: 28px; text-decoration:">
   								 <i class="fas fa-search"></i> 
							</a> 
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				<!--cleanser SECTION-->


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item cleanser">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							
							<img src="01Product Lines Imgs\Centella Line\Oilcleanse\1723806918425.jpg" alt="IMG-PRODUCT">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									SKINLINE Light Cleansing Oil 200ml
								</a>

								<span class="stext-105 cl3">
								₱699.00

								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>	
				</div>


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item cleanser">
					<!-- block -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs/Centella Line/Ampule cleanser/1723807243305.jpg" alt="IMG-PRODUCT">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Centella Ampule Foam Gel Cleanser
								</a>

								<span class="stext-105 cl3">
								₱399.00

								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>	
				</div>


					<!--MOISTURIZER SECTION-->


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ampoule">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs\Tone Bright\Tone Brightening Capsule Ampule 100ml\1724126454270.jpg" alt="IMG-PRODUCT">

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Tone Brightening Capsule Ampule 100ml	
								</a>
							
								<span class="stext-105 cl3">
								₱589.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ampoule">
					<!-- Block3 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs\ProBioCica\Probio Cica Intensive Ampoule 50ml 509\1724128752542.jpg" alt="IMG-PRODUCT">

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Probio Cica Intensive Ampoule 50ml 
								</a>

								<span class="stext-105 cl3">
								₱509.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>


					<!--SUNSCREEN SECTION-->

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item sunscreen">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs\HyaCica Line\Hyalu Cica Water Fit Sun Serum 50ml 429\Picsart_24-08-20_17-19-23-347.jpg" alt="IMG-PRODUCT">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Hyalu Cica Water Fit Sun Serum 50ml
								</a>

								<span class="stext-105 cl3">
								₱429.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item sunscreen">
					<!-- Block3 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs/TeaTrica/Tea Trica Soothing Sun Milk Sunscreen 499/1724143289051.jpg" alt="IMG-PRODUCT">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Tea Trica Soothing Sun Milk Sunscreen
								</a>

								<span class="stext-105 cl3">
								₱499.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>

				<!--TONER SECTION-->

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item toner">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs/HyaCica Line/Hyalu Cica Hydrating Brightening toner 210 ml 589/IMG_20240820_170353_85.jpg" alt="IMG-PRODUCT">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Hyalu Cica Hydrating Brightening Toner
																</a>

								<span class="stext-105 cl3">
							₱589.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item toner">
					<!-- Block3 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="01Product Lines Imgs/Poremizing/Poremizing Clear Toner 210 ml 599/1724140545412.jpg" alt="IMG-PRODUCT">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								SKINLINE Poremizing Clear Toner 210 ml
								</a>

								<span class="stext-105 cl3">
								₱599.00
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="product.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>

<!-- Slogan Chariz -->
<div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="value-card">
				<img src="images/icons/bunny.svg" class="servicon" alt="PETA Vegan & Cruelty-Free">
                    <div class="value-title">PETA Vegan & Cruelty-Free</div>
                    <div class="value-description">
                        At SkinLine, we believe in beauty with a conscience. Our skincare products are crafted with the utmost care, using only natural, cruelty-free ingredients. We are proud to be certified by PETA, ensuring that our products are both vegan and cruelty-free.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card">
                    <img src="images/icons/plant.svg" class="servicon" alt="EWG Verified">
                    <div class="value-title">EWG Verified</div>
                    <div class="value-description">
                        SkinLine's commitment to safety is paramount. Our products are EWG Verified, meaning they meet the Environmental Working Group’s strict criteria for transparency and health. We use only the cleanest ingredients, ensuring that each product is gentle and safe for all skin types.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card">
                    <img src="images/icons/fragrance.svg" class="servicon" alt="Artificial Fragrance-Free">
                    <div class="value-title">Artificial Fragrance-Free</div>
                    <div class="value-description">
                        We embrace the essence of nature. SkinLine products are free from artificial fragrances, allowing the natural ingredients to shine through. Enjoy the subtle, authentic scents derived from pure botanicals and essential oils, providing a luxurious and natural skincare experience.
                    </div>
                </div>
            </div>
        </div>
    </div>


 
	<!-- Footer Banner -->
	<div class="footban" style="text-align: center; margin-bottom: 35px; ">
		<img src="images/Banners/bannershe1t.png" alt="fBanner" 
			style="width: 100%; max-width: 1500px; height: 150px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" />
		
	</div>

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
							<a href="refund.php" class="stext-107 cl7 hov-cl1 trans-04">
								Refund Policy
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

	
</script>
	

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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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
		<script src="https://kit.fontawesome.com/b8a0ff877f.js" crossorigin="anonymous"></script>
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
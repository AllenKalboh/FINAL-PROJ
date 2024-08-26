<?php
include ('db.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SkinLine Tutorial</title>
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
<body class="animsition">

<style>

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

</style>
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
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
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li >
								<a href="about.php">About</a>
							</li>

							<li class="active-menu">
								<a href="tutorial.php"> SkinHub</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>

						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11js-show-cart">
						<a href="shoping-cart.php" style="color:black;">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						</div>

					
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<a href="index.php" class="logo">
						<img src="images/icons/logoo.png" alt="IMG-LOGO">
					</a>
					<a href="index.php" class="logo">
						<img src="images/icons/log.png" alt="IMG-LOGO">
					</a>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
					<i class="zmdi zmdi-shopping-cart"></i>
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
						<a href="Helpfaqs.php" class="flex-c-m p-lr-10 trans-04">
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
    transform: scale(0.9); /* Shrink initially */
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
        SkinHub
    </h2>
    <br>
    <p class="txt-white cl0 txt-center text-effect" data-effect="zoom-in">
        Your guide to all things skincare.
    </p>
</section>

<!-- guide Banner 1 -->

<div class="container mt-5 ">
        <div class="banner-container text-effect" data-effect="fade-down">
			<!-- Title Image -->
			<img src="images/bgindex/bgtit.png" alt="Skincare Routine Title" class="title-image">
            <div class="d-flex flex-wrap justify-content-center text-effect" data-effect="zoom-in">
            <!-- Step 1 -->
            <div class="step-container text-effect" data-effect="zoom-in">
                <img src="images/bgindex/cleanser.jpg" alt="Step 1" class="step-image">
                <h3 class="step-title">Cleanser</h3>
                <p class="step-text">Step 1</p>
            </div>
            <!-- Step 2 -->
            <div class="step-container">
                <img src="images/bgindex/toner.jpg" alt="Step 2" class="step-image">
                <h3 class="step-title">Toner</h3>
                <p class="step-text">Step 2</p>
            </div>
            <!-- Step 3 -->
            <div class="step-container">
                <img src="images/bgindex/serum.jpg" alt="Step 3" class="step-image">
                <h3 class="step-title">Ampoule</h3>
                <p class="step-text">Step 3</p>
            </div>
            <!-- Step 4 -->
            <div class="step-container">
                <img src="images/bgindex/moisturizer.jpg" alt="Step 4" class="step-image">
                <h3 class="step-title">Moisturizer</h3>
                <p class="step-text">Step 4</p>
            </div>
            <!-- Step 5 -->
            <div class="step-container">
                <img src="images/bgindex/eyecare.jpg" alt="Step 5" class="step-image">
                <h3 class="step-title">Eyecare</h3>
                <p class="step-text">Step 5</p>
            </div>
            <!-- Step 6 -->
            <div class="step-container">
                <img src="images/bgindex/sunscreen.jpg" alt="Step 6" class="step-image">
                <h3 class="step-title">Sunscreen</h3>
                <p class="step-text">Step 6</p>
            </div>
        </div>
    </div>
	</div>
	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
						Centella Line
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Welcome to Skinline, your ultimate destination for skincare solutions tailored to meet diverse needs. At Skinline, we are dedicated to more than just selling products; we aim to be your trusted source of information and inspiration in the world of skincare.
						</p>

						<p class="stext-113 cl6 p-b-26">
						What sets Skinline apart is our commitment to going beyond the traditional e-commerce experience. We not only offer a wide range of skincare products that cater to different skin types and conditions, but we also provide valuable insights, tutorials, guides, and instructions to help you make informed decisions.
						</p>

						<p class="stext-113 cl6 p-b-26">
						At Skinline, we believe that skincare is a journey, and we're here to support you at every stage. Our community of skincare enthusiasts and experts is here to share knowledge, explore new techniques, and stay updated with the latest in skincare innovation.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto text-effect" data-effect="zoom-in">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/cente.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
							Hyalu Cica Line
						</h3>
						<p class="stext-113 cl6 p-b-26">
						Our mission is to empower users with the wisdom and tools needed to nurture your skin’s natural beauty. We recognize that skincare is a deep personal journey, deserving thoughtful guidance and which is why we are committed to providing more than just products. Whether addressing specific concerns or refining your daily routine, our curated product lines and expert insights are designed to accompany, guide and support you at every step
						</p>

						<p class="stext-113 cl6 p-b-26">
						We are more than a skincare brand; we are a community where knowledge and beauty intertwine. Our aspiration is to be your trusted companion on the path to radiant, healthy skin, inspiring you to explore, discover, and evolve with every step.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
							“Great skin doesn't happen by chance; it happens by making informed choices.”
							</p>

							<span class="stext-111 cl8">
								- SkinLine
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 text-effect" data-effect="zoom-in">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/hya.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			<br>
<br>
<br>
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
						Brightening Line
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Welcome to Skinline, your ultimate destination for skincare solutions tailored to meet diverse needs. At Skinline, we are dedicated to more than just selling products; we aim to be your trusted source of information and inspiration in the world of skincare.
						</p>

						<p class="stext-113 cl6 p-b-26">
						What sets Skinline apart is our commitment to going beyond the traditional e-commerce experience. We not only offer a wide range of skincare products that cater to different skin types and conditions, but we also provide valuable insights, tutorials, guides, and instructions to help you make informed decisions.
						</p>

						<p class="stext-113 cl6 p-b-26">
						At Skinline, we believe that skincare is a journey, and we're here to support you at every stage. Our community of skincare enthusiasts and experts is here to share knowledge, explore new techniques, and stay updated with the latest in skincare innovation.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto text-effect" data-effect="zoom-in">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/bright.png" alt="IMG">
						</div>
					</div>
				</div>

				<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md text-effect" data-effect="fade-down">
					<br>
					<br>
					<h3 class="mtext-111 cl2 p-b-16">
							Tea Trica Line
						</h3>
						<p class="stext-113 cl6 p-b-26">
						Our mission is to empower users with the wisdom and tools needed to nurture your skin’s natural beauty. We recognize that skincare is a deep personal journey, deserving thoughtful guidance and which is why we are committed to providing more than just products. Whether addressing specific concerns or refining your daily routine, our curated product lines and expert insights are designed to accompany, guide and support you at every step
						</p>

						<p class="stext-113 cl6 p-b-26">
						We are more than a skincare brand; we are a community where knowledge and beauty intertwine. Our aspiration is to be your trusted companion on the path to radiant, healthy skin, inspiring you to explore, discover, and evolve with every step.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
							“Great skin doesn't happen by chance; it happens by making informed choices.”
							</p>

							<span class="stext-111 cl8">
								- SkinLine
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 text-effect" data-effect="zoom-in">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/tt.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<br>
			<br>

			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
						Pore Mizing Line
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Welcome to Skinline, your ultimate destination for skincare solutions tailored to meet diverse needs. At Skinline, we are dedicated to more than just selling products; we aim to be your trusted source of information and inspiration in the world of skincare.
						</p>

						<p class="stext-113 cl6 p-b-26">
						What sets Skinline apart is our commitment to going beyond the traditional e-commerce experience. We not only offer a wide range of skincare products that cater to different skin types and conditions, but we also provide valuable insights, tutorials, guides, and instructions to help you make informed decisions.
						</p>

						<p class="stext-113 cl6 p-b-26">
						At Skinline, we believe that skincare is a journey, and we're here to support you at every stage. Our community of skincare enthusiasts and experts is here to share knowledge, explore new techniques, and stay updated with the latest in skincare innovation.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto text-effect" data-effect="zoom-in">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/pore.png" alt="IMG">
						</div>
					</div>
				</div>

				<br>
				<br>
			
				<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md text-effect" data-effect="fade-down">
					<br>
					<br>
					
					<h3 class="mtext-111 cl2 p-b-16">
							ProBio Cica Line
						</h3>
						<p class="stext-113 cl6 p-b-26">
						Our mission is to empower users with the wisdom and tools needed to nurture your skin’s natural beauty. We recognize that skincare is a deep personal journey, deserving thoughtful guidance and which is why we are committed to providing more than just products. Whether addressing specific concerns or refining your daily routine, our curated product lines and expert insights are designed to accompany, guide and support you at every step
						</p>

						<p class="stext-113 cl6 p-b-26">
						We are more than a skincare brand; we are a community where knowledge and beauty intertwine. Our aspiration is to be your trusted companion on the path to radiant, healthy skin, inspiring you to explore, discover, and evolve with every step.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
							“Great skin doesn't happen by chance; it happens by making informed choices.”
							</p>

							<span class="stext-111 cl8">
								- SkinLine
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 text-effect" data-effect="zoom-in">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/probio.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			</div>
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
							<a href="Helpfaqs.php" class="stext-107 cl7 hov-cl1 trans-04" target=_blank>
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
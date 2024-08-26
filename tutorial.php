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

/* video banners*/
.video-banner {
    background-color: #686D76;
    padding: 50px 0;
	margin-top: 80px;
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

	<section class="bg-img1 txt-center p-lr-15 p-tb-92 m-b-5" style="background-image: url('images/Banners/bannerbg1.png');">
    <h2 class="ltext-105 cl0 txt-center  text-effect" data-effect="fade-down">
        SkinHub
    </h2>
<br>
	<br>
    <p class="stext-113 text-light cl6 p-b-5  text-effect justify-content text-center" data-effect="zoom-in">
				Welcome to SkinHub, your trusted destination for specialized skincare solutions. At SkinLine, we understand that every skin type has unique needs,
						</p>
						<p class="stext-113 text-light cl6 p-b-5 text-effect justify-content text-center " data-effect="zoom-in">
						 which is why we offer a diverse range of product lines, each meticulously formulated to address specific skin concerns
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
	 
	<section class="bg0 p-t-75 p-b-6">
		<div class="container">
			<div class="row p-b-20">
				<div class="col-md-7 col-lg-8">


					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
						Centella Line  
						</h3>
						<p class=" cl2 p-b-16 text-secondary">
						 Intensive Soothing and Calming
</p>
						

						<p class="stext-113 cl6 p-b-26">
						This Line is the heart of SkinLine, tailored for those who need immediate relief from irritated and sensitive skin. This line centers around Centella Asiatica, a botanical ingredient renowned for its anti-inflammatory and skin-repairing properties. It is especially beneficial for skin that is prone to redness, irritation, or stress-induced flare-ups.						</p>

						<p class="stext-113 cl6 p-b-26">
						Each product in the Centella Line is carefully formulated to calm the skin and support its natural healing processes. By reducing inflammation and reinforcing the skin’s protective barrier, these products help restore balance and comfort. This line is ideal for anyone dealing with sensitivity, whether due to environmental factors, stress, or chronic conditions.

</p>

						<p class="stext-113 cl6 p-b-26">
						Ultimately, the Centella Line offers a nurturing experience that leaves your skin feeling soothed, strengthened, and more resilient. It’s a trusted solution for those seeking to bring peace and calm to their skin, ensuring long-term health and vitality.

</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto text-effect" data-effect="zoom-in">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/c.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16 ">
							Hyalu Cica Line
						</h3>
						<p class=" cl2 p-b-16 text-secondary">
						Deep Hydration and Moisturizing

</p>
						<p class="stext-113 cl6 p-b-26">
						The Hyalu Cica Line is designed to combat dehydration and restore moisture to your skin. This line features a powerful combination of Hyaluronic Acid, known for its exceptional ability to retain water, and Centella Asiatica, which provides additional soothing benefits. Together, they create a deeply hydrating experience that replenishes and locks in moisture.


</p>

						<p class="stext-113 cl6 p-b-26">
						Products in the Hyalu Cica Line are perfect for those with dry or moisture-depleted skin, offering long-lasting hydration that keeps the skin plump and smooth. The lightweight formulas are easily absorbed, delivering moisture deep into the skin without feeling heavy or greasy.

</p>

						
						<p class="stext-113 cl6 p-b-26">
						By regularly using the Hyalu Cica Line, your skin will appear more hydrated, supple, and youthful. This line is all about maintaining optimal moisture levels, ensuring your skin looks and feels its best, day in and day out.
</p>

							<span class="stext-111 cl8">
								
							</span>
						
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 text-effect" data-effect="zoom-in">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/h.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			<br>
<br>
<br>

				<div class="row p-b-">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
						Brightening Line
						</h3>
						<p class=" cl2 p-b-1 text-secondary">
						Achieving Radiant, Glowing Skin

</p>

						<p class="stext-113 cl6 p-b-26">
						The Tone Brightening Line is SkinLine’s answer for those seeking a luminous, even complexion. This line focuses on brightening the skin and reducing the appearance of dark spots and discoloration. Formulated with powerful brightening agents, each product works to enhance your skin’s natural radiance and provide a more uniform tone.

</p>

						<p class="stext-113 cl6 p-b-26">
						Products in the Tone Brightening Line are ideal for anyone looking to achieve a healthy glow. Whether you're dealing with hyperpigmentation, dullness, or uneven skin tone, this line offers targeted solutions that gradually reveal a more radiant complexion. The formulas are gentle yet effective, making them suitable for daily use.

</p>

						<p class="stext-113 cl6 p-b-26">
						With consistent use, the Tone Brightening Line helps to reveal brighter, more luminous skin, allowing you to achieve that coveted glow. It’s your go-to solution for enhancing skin clarity and boosting overall radiance, giving you a fresh, youthful look.

</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto text-effect" data-effect="zoom-in">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/b.png" alt="IMG">
						</div>
					</div>
				</div>



				
</div>
</div>

</section>


				<div class="container-fluid video-banner">
    <div class="container">
        <h2 class="text-center text-light mb-5">Video Gallery</h2>
        <div id="videoReviewsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/v1.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 1</div>
                                    <div class="video-description">
                                        This is a detailed review of the product by the customer. The customer shares their experience with the product and how it has benefited them.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/v2.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 2</div>
                                    <div class="video-description">
                                        Another satisfied customer shares their thoughts on the product, detailing the positive changes they've noticed.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video3.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 3</div>
                                    <div class="video-description">
                                        A comprehensive review that highlights the key benefits and overall satisfaction with the product.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
<!--video banner-->
                <div class="carousel-item">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video1.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 1</div>
                                    <div class="video-description">
                                        This is a detailed review of the product by the customer. The customer shares their experience with the product and how it has benefited them.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video2.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 2</div>
                                    <div class="video-description">
                                        Another satisfied customer shares their thoughts on the product, detailing the positive changes they've noticed.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video3.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 3</div>
                                    <div class="video-description">
                                        A comprehensive review that highlights the key benefits and overall satisfaction with the product.
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

<section class="bg0 p-t-75 p-b-6">
<div class="container">
				<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md text-effect" data-effect="fade-down">
					<br>
					<br>
					<h3 class="mtext-111 cl2 p-b-16">
							Tea Trica Line
						</h3>
						<p class=" cl2 p-b-16 text-secondary">
						Sensitive and Acne-Prone Skin Care

</p>
						<p class="stext-113 cl6 p-b-26">
						The Tea Trica Line is specifically designed for those with sensitive, acne-prone skin. This line harnesses the purifying power of Tea Tree Oil and other natural ingredients known for their antibacterial and anti-inflammatory properties. Each product is carefully formulated to target acne and blemishes without irritating the skin.

</p>

						<p class="stext-113 cl6 p-b-26">
						The Tea Trica Line provides a comprehensive approach to acne care, helping to unclog pores, reduce excess oil, and calm inflammation. This line is perfect for those who experience regular breakouts, as well as those with combination or oily skin types that are prone to congestion.

</p>

						
						<p class="stext-113 cl6 p-b-26">
						Over time, the Tea Trica Line helps to clear up blemishes while maintaining the skin’s balance, preventing future breakouts, and soothing irritation. It’s a must-have for anyone looking to manage acne while keeping their skin calm and comfortable.

</p>

							<span class="stext-111 cl8">
								
							</span>
						
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 text-effect" data-effect="zoom-in">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/t.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<br>
			<br>

			<div class="row p-b-">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md text-effect" data-effect="fade-down">
						<h3 class="mtext-111 cl2 p-b-16">
						Pore Mizing Line
						</h3>
						<p class=" cl2 p-b-1 text-secondary">
						Pore Care and Refinement

</p>

						<p class="stext-113 cl6 p-b-26">
						The Poremizing Line is SkinLine’s solution for those looking to refine and minimize the appearance of pores. This line focuses on deep-cleaning pores and tightening the skin to create a smoother, more refined texture. Each product is designed to target enlarged pores and reduce excess oil production.

</p>

						<p class="stext-113 cl6 p-b-26">
						The Poremizing Line works by clearing out impurities from the pores and shrinking them over time, leaving your skin looking smoother and more even. This line is particularly beneficial for those with oily or combination skin, where visible pores are a common concern.

</p>

						<p class="stext-113 cl6 p-b-26">
						By incorporating the Poremizing Line into your skincare routine, you’ll notice a reduction in the appearance of pores and a more matte, refined finish to your skin. It’s the ideal choice for achieving a polished, poreless look.

</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto text-effect" data-effect="zoom-in">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/p.png" alt="IMG">
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
						<p class=" cl2 p-b-16 text-secondary">
						Skin Barrier Care and Revitalization

</p>
						<p class="stext-113 cl6 p-b-26">
						The Probio Cica Line is dedicated to strengthening and revitalizing the skin’s natural barrier. This line combines probiotics with Centella Asiatica to enhance the skin’s resilience and protect against environmental stressors. Each product is formulated to support the skin’s microbiome, which is essential for maintaining healthy, balanced skin.



</p>

						<p class="stext-113 cl6 p-b-26">
						Products in the Probio Cica Line focus on repairing and fortifying the skin barrier, making it more resistant to damage and irritation. This line is ideal for those who have compromised skin barriers due to harsh treatments, environmental damage, or general sensitivity.

</p>

						
						<p class="stext-113 cl6 p-b-26">
						With regular use, the Probio Cica Line helps to restore your skin’s natural strength and vitality, leaving it healthier, more resilient, and visibly revitalized. It’s the perfect choice for anyone looking to rebuild and maintain a strong, healthy skin barrier.
</p>

							<span class="stext-111 cl8">
								
							</span>
						
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 text-effect" data-effect="zoom-in">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/pbc.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			</div>
		</div>
		</div>
		</div>
		</div>


	</section>	
	
	<div class="container-fluid video-banner">
    <div class="container">
        <h2 class="text-center text-light mb-5">Video Gallery</h2>
        <div id="videoReviewsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/v1.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 1</div>
                                    <div class="video-description">
                                        This is a detailed review of the product by the customer. The customer shares their experience with the product and how it has benefited them.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="vid/v2.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 2</div>
                                    <div class="video-description">
                                        Another satisfied customer shares their thoughts on the product, detailing the positive changes they've noticed.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video3.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 3</div>
                                    <div class="video-description">
                                        A comprehensive review that highlights the key benefits and overall satisfaction with the product.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
<!--video banner-->
                <div class="carousel-item">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video1.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 1</div>
                                    <div class="video-description">
                                        This is a detailed review of the product by the customer. The customer shares their experience with the product and how it has benefited them.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video2.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 2</div>
                                    <div class="video-description">
                                        Another satisfied customer shares their thoughts on the product, detailing the positive changes they've noticed.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="video-container">
                                <div class="video-wrapper">
                                    <video controls>
                                        <source src="path-to-your-video3.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="text-container">
                                    <div class="video-title">Customer Review 3</div>
                                    <div class="video-description">
                                        A comprehensive review that highlights the key benefits and overall satisfaction with the product.
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
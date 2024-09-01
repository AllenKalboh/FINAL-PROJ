<div?php
include ('db.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SkinLine Help & Faqs</title>
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
.wrap-menu-desktop {
    position: fixed;
    top: 0;
    width: 100%; /* Reduce the header width to 80% */
    left: 50%;
    transform: translateX(-50%); /* Center the header */
    z-index: 1000;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease; /* Smooth transition for animation */
	border-radius: 5px;
}

.logo-large img {
    max-height: 90px; /* Larger size for the first logo */
    transform: translateY(-10%); /* Surpass the header size slightly */
	margin-left: 150px;
}

.logo img {
    max-height: 80px; /* Regular size for the second logo */
	align-items: left;
}

/* Animation effect on scroll */
.wrap-menu-desktop.scrolled {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
	border-radius: 5px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
    padding: 5px 0; /* Reduce padding when scrolled */

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
<div class="wrap-menu-desktop how-shadow1">
    
        <div class="row align-items-center justify-content-between">
            <!-- First Logo (larger, on the left) -->
            <div class="col-auto">
                <a href="index.php" class="logo-large">
                    <img src="images/icons/logoo.png" alt="IMG-LOGO">
                </a>
            </div>
            <!-- Second Logo (on the right) -->
            <div class="col">
                <a href="index.php" class="logo">
                    <img src="images/icons/log.png" alt="IMG-LOGO">
                </a>
            </div>
        </div>
    </div>

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

		<!-- Title page -->
		 <br>
		 <br>
		 <br>
		 <br>
		 <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/Banners/bannerbg1.png');">
    <h2 class="ltext-105 cl0 txt-center text-effect" data-effect="fade-down">
        Skincare Help & FAQs
    </h2>
    <br>
    <p class="txt-white cl0 txt-center text-effect" data-effect="zoom-in">
        Your guide to all things skincare.
    </p>
</section>
	<!-- Header 
	
		 Header desktop
		<div class="container-menu-desktop">
			<!-- Topbar 
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
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
				< class="limiter-menu-desktop container">
					
					<!-- Logo desktop 		
					<a href="index.php" class="logo">
						<img src="images/icons/logoo.png" alt="IMG-LOGO">
					</a>
					<a href="index.php" class="logo">
						<img src="images/icons/log.png" alt="IMG-LOGO">
					</a>
					</div>
					<!-- Menu desktop 
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							

							<li class="active-menu">
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="tutorial.php">SkinHub</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>

						</ul>
					</div>	-->

					<!-- Icon header 
					<div class="wrap-icon-header flex-w flex-r-m">
						

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11js-show-cart">
						<a href="shoping-cart.php" style="color:black;">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						</div>

					
					</div>
				</nav>-->
			</div>	
		</div>

		<!-- Header Mobile 
		<div class="wrap-header-mobile">
			<!-- Logo moblie 		
			<a href="index.php" class="logo">
						<img src="images/icons/logoo.png" alt="IMG-LOGO">
					</a>
					<a href="index.php" class="logo">
						<img src="images/icons/log.png" alt="IMG-LOGO">
					</a>

			<!-- Icon header 
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

			</div>
-->
			<!-- Button show menu -
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile 
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
					</div>
				</li>
			</ul>
-->
			<!--<ul class="main-menu-m">
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

 <!--Modal Search 
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

	 Cart 
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

-->
	
<style>
/* Basic Reset */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Container */
.container {
    
    padding: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Header */
header h1 {
    font-size: 2.2em;
    margin-bottom: 10px;
    color: #444;
}

header p {
    font-size: 1.1em;
    color: #666;
}

/* Buttons */
.buttons {
    margin: 20px 0;
	text-align: center;
}

.button {
    background-color: #000000;
    border: none;
    padding: 10px 20px;
    margin: 0 10px;
    color: #fff;
    font-size: 1.1em;
    cursor: pointer;
    border-radius: 5px;
	text-align: center;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #505050;
    color: #ffffff;
}

/* Content */
.content {
    text-align: left;
    font-size: 1em;
    color: #444;
    margin-top: 20px;
    opacity: 0; /* Hidden initially */
    transform: translateY(20px); /* Move down initially */
    transition: opacity 0.5s ease, transform 0.5s ease; /* Smooth transition */
}

/* Animation for smooth appearance */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.content.animate {
    opacity: 1; /* Fade in */
    transform: translateY(0); /* Move to original position */
}

.content h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
    color: #555;
}

.content ul {
    padding-left: 20px;
}

.content ul li {
    margin-bottom: 10px;
    list-style-type: disc;
}

.img-logo {
    width: 100px;
}

.back-button {
    position: fixed; /* Fixed position relative to the viewport */
    top: 20px; /* Distance from the top */
    left: 20px; /* Distance from the left */
    display: flex;
    align-items: center;
    color: #ffffff; /* Blue color for the icon */
    text-decoration: none;
    font-size: 18px; /* Font size for the icon */
    padding: 8px; /* Padding around the button */
    border: 1px solid #000000; /* Border color */
    border-radius: 4px; /* Rounded corners */
    background-color: #494949; /* Background color */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    z-index: 1000; /* Ensure it is on top of other elements */
}

.back-button i {
    font-size: 20px; /* Font size for the icon */
}

.back-button:hover {
    transform: scale(1.10);
    transition: 0.3s;
}

/* Responsive layout for columns */
.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
}

.col-md-7, .col-md-5 {
    padding: 15px;
}

.col-md-7 {
    flex: 0 0 58.333%;
    max-width: 58.333%;
}

.col-md-5 {
    flex: 0 0 41.667%;
    max-width: 41.667%;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.how-bor1 {
    border: 1px solid #ddd;
    padding: 10px;
}

.hov-img0 img {
    width: 100%;
    height: auto;
}
/* Animation for fading in and zooming up */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.content.animate {
    animation: fadeInUp 0.6s ease-out;
}

</style>

	<div class="container" style="width:9999999999999999999999999px;">

       

        <div class="buttons">
            <button class="button" onclick="showContent('help')">Help</button>
            <button class="button" onclick="showContent('faq')">FAQs</button>
        </div>

        <div id="content" class="content">
            <!-- Content will change dynamically -->
        </div>
   <script>
function showContent(section) {
    const contentDiv = document.getElementById('content');

    // Clear any existing content
    contentDiv.innerHTML = '';

    // Remove animation class if it exists
    contentDiv.classList.remove('animate');

    // Force reflow to ensure animation class is re-applied
    void contentDiv.offsetWidth; // Trigger a reflow

    // Update content based on the section
    if (section === 'help') {
        contentDiv.innerHTML = `
            <div class="row">
                <div class="col-md-7"> <!-- Text content column -->
                    <h2>Help</h2>
                    <p>If you need assistance with your skincare routine, feel free to reach out to us at skinlineessentials@gmail.com.</p>
                    <br>
                    <p>Here are a few tips to enhance your skincare routine:</p>
                    <ul>
                        <li><strong>What’s the best routine for oily skin?</strong><br>Use a gentle foaming cleanser, followed by a toner, an oil-free moisturizer, and a lightweight sunscreen.</li>
                        <li><strong>How often should I exfoliate?</strong><br>For most skin types, exfoliating 1-2 times a week is enough. Over-exfoliation can lead to irritation and damage.</li>
                        <li><strong>Can I skip moisturizer if I have oily skin?</strong><br>No! Even oily skin needs hydration. Opt for a gel-based or lightweight, oil-free moisturizer.</li>
                        <li><strong>What’s the ideal order of applying products?</strong><br>Cleansing -> Toning -> Serum -> Moisturizer -> Sunscreen (in the morning). In the evening, replace sunscreen with treatments or oils.</li>
                        <li><strong>How do I reduce fine lines?</strong><br>Look for products containing retinoids, peptides, and hyaluronic acid. Always use sunscreen to prevent further damage.</li>
                        <li><strong>What’s a good routine for sensitive skin?</strong><br>Stick to gentle, fragrance-free products. Avoid harsh exfoliants and incorporate soothing ingredients like chamomile, aloe, and ceramides.</li>
                        <li><strong>Why is sunscreen important indoors?</strong><br>UV rays can penetrate windows and contribute to aging. Broad-spectrum sunscreen protects against both UVA and UVB rays.</li>
                    </ul>
                    <p>Still need help? Here are some common scenarios:</p>
                    <ul>
                        <li><strong>Dealing with Breakouts:</strong> Consider products with salicylic acid and benzoyl peroxide.</li>
                        <li><strong>Uneven Skin Tone:</strong> Try serums with niacinamide or alpha arbutin.</li>
                        <li><strong>Dry Patches:</strong> Hydrating masks and overnight moisturizers can do wonders.</li>
                    </ul>
                </div>
                <div class="col-md-5"> <!-- Image column -->
                    <div class="how-bor1">
                        <div class="hov-img0">
                            <img src="images/Banners/bgcentella.jpg" alt="Help Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        `;
    } else if (section === 'faq') {
        contentDiv.innerHTML = `
            <div class="row">
                <div class="col-md-5"> <!-- Image column -->
                    <div class="how-bor1">
                        <div class="hov-img0">
                            <img src="images/Banners/bgbright.jpg" alt="FAQ Image" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-7"> <!-- Text content column -->
                    <h2>FAQs</h2>
                    <p>Here are some frequently asked questions about skincare:</p>
                    <ul>
                        <li><strong>What’s the best routine for oily skin?</strong><br>Use a gentle foaming cleanser, followed by a toner, an oil-free moisturizer, and a lightweight sunscreen.</li>
                        <li><strong>How often should I exfoliate?</strong><br>For most skin types, exfoliating 1-2 times a week is enough. Over-exfoliation can lead to irritation and damage.</li>
                        <li><strong>Can I skip moisturizer if I have oily skin?</strong><br>No! Even oily skin needs hydration. Opt for a gel-based or lightweight, oil-free moisturizer.</li>
                        <li><strong>What’s the ideal order of applying products?</strong><br>Cleansing -> Toning -> Serum -> Moisturizer -> Sunscreen (in the morning). In the evening, replace sunscreen with treatments or oils.</li>
                        <li><strong>How do I reduce fine lines?</strong><br>Look for products containing retinoids, peptides, and hyaluronic acid. Always use sunscreen to prevent further damage.</li>
                        <li><strong>What’s a good routine for sensitive skin?</strong><br>Stick to gentle, fragrance-free products. Avoid harsh exfoliants and incorporate soothing ingredients like chamomile, aloe, and ceramides.</li>
                        <li><strong>Why is sunscreen important indoors?</strong><br>UV rays can penetrate windows and contribute to aging. Broad-spectrum sunscreen protects against both UVA and UVB rays.</li>
                    </ul>
                </div>
            </div>
        `;
    }

    // Add animation class
    contentDiv.classList.add('animate');
}

</script>
</div>
	<!-- Content page -->


	
	
	<style>
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
	</style>


	<!-- Footer -->
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
	<script src="https://kit.fontawesome.com/b8a0ff877f.js" crossorigin="anonymous"></script>

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
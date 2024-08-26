<div?php
include ('db.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SkinLine About</title>
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
        Refund Policy
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
  width: 80%;
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

h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        h2 {
            font-size: 1.5rem;
            color: #333;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            text-align: justify;
            margin-bottom: 1rem;
        }
        /* Apply bullet styles only to lists inside the .policy-content class */
        .policy-content ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            list-style-type: disc;
			
        }

        .policy-content ul li {
            margin-bottom: 0.5rem;
        }

        a {
            color: #5A9;
            text-decoration: none;
        }

        a:hover {
            color: #333;
            text-decoration: underline;
        }
</style>

<div class="container my-5 policy-content">
    <h1>Privacy Policy</h1>
    <p>
        At Skinline, we value your privacy and are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, and safeguard your data when you interact with our website and services.
    </p>

    <h2>Information We Collect</h2>
    <ul>
        <li><strong>• Personal Information:</strong> We collect personal details such as your name, email address, shipping address, and payment information when you make a purchase or register on our website.</li>
        <li><strong>• Non-Personal Information:</strong> We may collect non-personal data such as your browser type, device information, and IP address to help improve our services.</li>
        <li><strong>• Cookies:</strong> Our website uses cookies to enhance your browsing experience by remembering your preferences and login information.</li>
    </ul>

    <h2>How We Use Your Information</h2>
    <ul>
        <li><strong>• Order Processing:</strong> We use your personal information to process and fulfill your orders, including sending you confirmation emails and tracking details.</li>
        <li><strong>• Customer Support:</strong> Your information allows us to provide customer support, respond to inquiries, and address any issues related to our products or services.</li>
        <li><strong>• Marketing Communications:</strong> With your consent, we may send you promotional emails about new products, special offers, and other updates.</li>
    </ul>

    <h2>How We Protect Your Information</h2>
    <ul>
        <li><strong>• Data Encryption:</strong> We use secure encryption technologies to protect your personal and payment information during transmission.</li>
        <li><strong>• Access Controls:</strong> Access to your personal data is restricted to authorized personnel who require it for the purposes outlined in this policy.</li>
        <li><strong>• Regular Audits:</strong> We conduct regular audits of our security practices to ensure your information is safe from unauthorized access.</li>
    </ul>

    <h2>Sharing Your Information</h2>
    <ul>
        <li><strong>• Third-Party Services:</strong> We may share your information with trusted third-party service providers who assist us in operating our website, processing payments, or delivering products to you.</li>
        <li><strong>• Legal Obligations:</strong> We may disclose your information if required to do so by law or in response to valid requests by public authorities.</li>
        <li><strong>• Business Transfers:</strong> In the event of a merger, acquisition, or sale of assets, your personal information may be transferred to the new entity.</li>
    </ul>

    <h2>Your Rights</h2>
    <ul>
        <li><strong>• Access and Correction:</strong> You have the right to access, correct, or update your personal information at any time by logging into your account or contacting us directly.</li>
        <li><strong>• Opt-Out:</strong> You may opt out of receiving marketing communications from us by following the unsubscribe instructions included in our emails or contacting our support team.</li>
        <li><strong>• Data Deletion:</strong> You can request the deletion of your personal data by contacting us, and we will comply with your request in accordance with applicable laws.</li>
    </ul>

    <h2>Changes to This Privacy Policy</h2>
    <p>
        We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. Any updates will be posted on this page, and we encourage you to review it periodically.
    </p>

    <h2>Contact Us</h2>
    <p>
	 If you have any questions or concerns about our Privacy Policy or how we handle your information, please contact us at:
    </p>
    <ul>
        <li><strong>• Email:</strong> <a href="mailto:skinlineest2024@gmail.com">skinlineest2024@gmail.com</a></li>
        <li><strong>• Phone:</strong> 09925424712</li>
        <li><strong>• Address:</strong> Trece Martires, Cavite</li>
    </ul>
</div>
	<!-- Content page -->


	
	
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
<?php

include('db.php'); // Ensure this file contains the MySQLi connection setup

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

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
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						
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

						<a href="search_page.php" class="sc-btn" style="font-size: 28px;">
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
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					
				</div>
				

				
				<a href="shoping-cart.php" style="color: black; font-size: 28px">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						<a href="search_page.php" class="sc-btn" style="font-size: 28px;">
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
        About
    </h2>
    <br>
    <p class="txt-white cl0 txt-center text-effect" data-effect="zoom-in">
        Get to know more about us.
    </p>
</section>	


	<!-- Content page -->
	
	<section class="bg0 p-t-75 p-b-120 text-justify">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16 text-effect" data-effect="zoom-in">
						About Skinline
						</h3>

						<p class="stext-113 cl6 p-b-26 text-effect" data-effect="fade-down">
						Welcome to Skinline, your ultimate destination for skincare solutions tailored to meet diverse needs. At Skinline, we are dedicated to more than just selling products; we aim to be your trusted source of information and inspiration in the world of skincare.
						</p>

						<p class="stext-113 cl6 p-b-26 text-effect" data-effect="fade-down">
						What sets Skinline apart is our commitment to going beyond the traditional e-commerce experience. We not only offer a wide range of skincare products that cater to different skin types and conditions, but we also provide valuable insights, tutorials, guides, and instructions to help you make informed decisions.
						</p>

						<p class="stext-113 cl6 p-b-26 text-effect" data-effect="fade-down">
						At Skinline, we believe that skincare is a journey, and we're here to support you at every stage. Our community of skincare enthusiasts and experts is here to share knowledge, explore new techniques, and stay updated with the latest in skincare innovation.
						</p>

						<p class="stext-113 cl6 p-b-26 text-effect" data-effect="fade-down">
						Explore. Discover. Transform. Join Skinline today and let us help you achieve the healthy, radiant skin you deserve.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Banners/loginbanner.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16 text-effect" data-effect="zoom-in">
							Our Mission
						</h3>
						<p class="stext-113 cl6 p-b-26 text-effect" data-effect="fade-down">
						Our mission is to empower users with the wisdom and tools needed to nurture your skin’s natural beauty. We recognize that skincare is a deep personal journey, deserving thoughtful guidance and which is why we are committed to providing more than just products. Whether addressing specific concerns or refining your daily routine, our curated product lines and expert insights are designed to accompany, guide and support you at every step
						</p>

						<p class="stext-113 cl6 p-b-26 text-effect" data-effect="fade-down">
						We are more than a skincare brand; we are a community where knowledge and beauty intertwine. Our aspiration is to be your trusted companion on the path to radiant, healthy skin, inspiring you to explore, discover, and evolve with every step.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22 text-effect" data-effect="fade-down">
							<p class="stext-114 cl6 p-r-40 p-b-11 text-effect" data-effect="fade-down">
							“Great skin doesn't happen by chance; it happens by making informed choices.”
							</p>

							<span class="stext-111 cl8 text-effect" data-effect="zoom-in">
								- SkinLine
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Banners/aboutskin.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
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

/* sa dev team css*/
.team-member {
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center; /* Centering content horizontally */
    justify-content: space-between; /* Distributes space between content */
    margin-bottom: 30px;
    width: 100%; /* Ensures the container fits the column width */
    max-width: 350px; /* Fixed width for uniform size */
    height: 450px; /* Fixed height for uniform size */
    box-sizing: border-box; /* Ensures padding and border are included in the size */
}

.team-member img {
    width: 150px; /* Fixed image size */
    height: 150px;
    border-radius: 50%;
    margin-bottom: 15px;
    object-fit: cover; /* Ensures the image covers the circle */
    transition: transform 0.3s ease; /* Smooth zoom-in effect */
    border: 3px solid #dcdcdc; /* Grey border for images */
}

.team-member img:hover {
    transform: scale(1.1); /* Zoom effect on hover */
}

.team-member h4 {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.team-member p.role {
    font-size: 0.9rem; /* Smaller font size for the role */
    color: #666; /* Greyish color for the role */
    margin-bottom: 15px;
}

.team-member p.description {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 15px;
    text-align: justify; /* Justify the text */
}

.team-member .social-icons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.team-member .social-icons a {
    color: #fff;
    background-color: #333;
    border-radius: 50%;
    width: 30px; /* Social icons size */
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.team-member .social-icons a:hover {
    background-color: #555;
}

.team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
}

.team-row {
    row-gap: 30px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center all columns in the row */
}

.centered {
    display: flex;
    justify-content: center;
    align-items: center;
}


</style>

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


	<div id="section2">
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/Banners/bannerbg1.png');">
    <h2 class="ltext-105 cl0 txt-center text-effect" data-effect="fade-down">
        Skinline DEV Team
    </h2>
    <br>
    <p class="txt-white cl0 txt-center text-effect" data-effect="zoom-in">
        Meet our developers!
    </p>
</section>	
<br>
<br>
    <!-- Content for section 2 -->
	<div class="container">
    <div class="row team-row">
        <!-- Team Member 1 -->
        <div class="col-md-4">
            <div class="team-member">
                <img src="images/01 devs/allen.jpg" alt="Patrick Allen" class="text-effect" data-effect="zoom-in">
                <h4 class="name text-effect" data-effect="fade-down">Patrick Allen</h4>
                <p class="role text-effect" data-effect="zoom-in">Back-End Developer</p>
                <p class="description text-effect" data-effect="fade-down"> A skilled back-end developer adept at handling complex technical challenges. Ensure Skinline’s smooth operation by managing server-side logic, databases, and application functionality. Focuses on precision & efficiency which are crucial for a reliable user experience.</p>
                <div class="social-icons text-effect" data-effect="zoom-in">
                    <a href="https://www.facebook.com/profile.php?id=100010667265422" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/triksyuy/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:tmc.patrickallen.casili@cvsu.edu.ph"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-md-4">
            <div class="team-member">
                <img src="images/01 devs/ced.jpg" alt="Cedrique Alvarez" class="text-effect" data-effect="zoom-in">
				<h4 class="name text-effect" data-effect="fade-down">Cedrique Alvarez</h4>
                <p class="role text-effect" data-effect="zoom-in">Website Designer</p>
                <p class="description text-effect" data-effect="fade-down">A creative designer responsible for crafting Skinline’s visuals and user interface. Excels in converting innovative ideas into functional, engaging designs that balance aesthetics with usability. Ensures a cohesive user experience, enhancing overall look & feel of the website.</p>
                <div class="social-icons text-effect" data-effect="zoom-in">
                    <a href="https://www.facebook.com/cedrique.alvarez?mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/zy_zeno?igsh=bnZvMDY3b2p2em85" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:czfranxz@gmail.com"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-md-4">
            <div class="team-member">
                <img src="images/01 devs/jezreel.jpg" alt="Jezreel Peralta" class="text-effect" data-effect="zoom-in">
				<h4 class="name text-effect" data-effect="fade-down">Jezreel Peralta</h4>
                <p class="role text-effect" data-effect="zoom-in">Back-End Developer</p>
                <p class="description text-effect" data-effect="fade-down">Proficient in building and optimizing back-end systems, this developer maintains Skinline’s performance and security. Create scalable solutions and ensure the website operates efficiently, meeting high reliability standards.</p>
                <div class="social-icons text-effect" data-effect="zoom-in">
                    <a href="https://www.facebook.com/seigen.sora" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/s3igen05/?next=%2F" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:peralta0sora@gmail.com"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
        <!-- Team Member 4 -->
        <div class="col-md-4 centered">
            <div class="team-member">
                <img src="images/01 devs/aaron.jpg" alt="Aaron de Raya" class="text-effect" data-effect="zoom-in">
				<h4 class="name text-effect" data-effect="fade-down">Aaron de Raya</h4>
                <p class="role text-effect" data-effect="zoom-in">Interface Designer</p>
                <p class="description text-effect" data-effect="fade-down">An interface designer focused on creating user-friendly and visually engaging layouts. works on intuitive design elements that enhance navigation and user interaction, contributing to an enjoyable website experience.</p>
                <div class="social-icons text-effect" data-effect="zoom-in">
                    <a href="https://www.facebook.com/aaronpega.deraya?mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/sqtr_aaron14/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:ronpegaderaya14@gmail.com"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
        <!-- Team Member 5 -->
        <div class="col-md-4 centered">
            <div class="team-member">
                <img src="images/01 devs/sairon.jpg" alt="Sairon Manalad" class="text-effect" data-effect="zoom-in">
				<h4 class="name text-effect" data-effect="fade-down">Sairon Manalad</h4>
                <p class="role text-effect" data-effect="zoom-in">Graphic Designer</p>
                <p class="description text-effect" data-effect="fade-down">A creative graphic designer responsible for producing visually compelling content that supports Skinline’s brand. Designs graphics for various platforms, ensuring a cohesive and attractive visual identity.</p>
                <div class="social-icons text-effect" data-effect="zoom-in">
                    <a href="https://www.facebook.com/manaladsairon10?mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:saironmarkmanalad8@gmail.com"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
<br>
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
							</d>
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
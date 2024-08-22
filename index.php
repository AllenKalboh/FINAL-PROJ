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
.banner {
            width: 100%;
            padding-top: 100%; /* 1:1 Aspect Ratio */
            position: relative;
            overflow: hidden;
            perspective: 1200px; /* Enhances 3D effect */
			border-radius: 15px;
        }
        .banner-inner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1); /* Smooth and realistic transition */
            transform-style: preserve-3d; /* Allows 3D effects */
        }
        .banner:hover .banner-inner {
            transform: rotateY(180deg); /* Flips the card */
        }
        .banner-face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden; /* Hides the back face when turned */
        }
        .banner-front, .banner-back {
            background-size: cover;
            background-position: center;
        }
        .banner-front {
            background-color: #ddd;
            /* Front image */
        }
        .banner-back {
            background-color: #ccc;
            transform: rotateY(180deg); /* Rotates back face */
            /* Back image */
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


</style>

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $9,000
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="helpfaq.html" class="flex-c-m trans-04 p-lr-25">
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
						<img src="images/icons/logpic.png" alt="IMG-LOGO">
					</a>
					<a href="index.php" class="logo">
						<img src="images/icons/logtxt.png" alt="IMG-LOGO">
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

							

							
						</ul>
					</div>	

					<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
						<a href="shoping-cart.php" style="color:white;">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
					</div>	
					</div>
		<!-- helpfaq.html -->
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
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="helpfaq.html" class="flex-c-m p-lr-10 trans-04">
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
				<div class="item-slick1" style="background-image: url(images/hd.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 text-white cl2 respon2">
								Unveil Your Hidden Radiance, Redefine Boundaries
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 text-white respon1">
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
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="500">
								<h2 class="ltext-201 text-light cl2 p-t-19 p-b-43 respon1">
									Normal Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1100">
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
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="500">
								<h2 class="ltext-201 cl2 text-light p-t-19 p-b-43 respon1">
									Dry Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1100">
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
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="500">
								<h2 class="ltext-201 text-light cl2 p-t-19 p-b-43 respon1">
									Sensitive Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1100">
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
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="500">
								<h2 class="ltext-201 cl2 text-light p-t-19 p-b-43 respon1">
									Combination Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1100">
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
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Get to know your skintype
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="500">
								<h2 class="ltext-201 text-light cl2 p-t-19 p-b-43 respon1">
									Oily Skin?
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1100">
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

<!-- Events n promotions -->
<div class="container mt-5">
        <div class="row">
            <!-- First Banner -->
            <div class="col-12 col-md-4 mb-4">
                <div class="banner">
                    <div class="banner-inner">
                        <div class="banner-face banner-front" style="background-image: url('images/Banners/bannerback.png');">
                            <!-- Front Image -->
                        </div>
                        <div class="banner-face banner-back" style="background-image: url('images/Banners/eventsb1.jpg');">
                            <!-- Back Image -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Banner -->
            <div class="col-12 col-md-4 mb-4">
                <div class="banner">
                    <div class="banner-inner">
                        <div class="banner-face banner-front" style="background-image: url('images/Banners/bannerback.png');">
                            <!-- Front Image -->
                        </div>
                        <div class="banner-face banner-back" style="background-image: url('images/Banners/eventsb2.jpg');">
                            <!-- Back Image -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third Banner -->
            <div class="col-12 col-md-4 mb-4">
                <div class="banner">
                    <div class="banner-inner">
                        <div class="banner-face banner-front" style="background-image: url('images/Banners/bannerback.png');">
                        </div>
                        <div class="banner-face banner-back" style="background-image: url('images/Banners/eventsb3.jpg');">
                            <!-- Back Image -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container mt-5">
        <div class="depota">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
                <div class="col-auto">
                    <h2 class="b1 text-center mb-0">Events & Promotions</h2>
                </div>
				
                <div class="col">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
            </div>
        </div>
		



<!-- guide Banner -->
			<div class="skguideban mt-5" style="text-align: center; margin-bottom: 35px; ">
				<img src="images/Banners/SkGuide.png" alt="GBanner" 
			style="width: 100%; max-width: 1500px; height: 270px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" />	
			<a href = "https://www.youtube.com/shorts/p68FLWb3LHw"> <div class="block1-link stext-101 cl2">
									Watch Guide
								</div> </a>
			</div>
			
	</div>
</div>

	<!-- Banner -->
	<div class="sec-banner bg0 p-t-50 p-b-50">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Lines
				</h3>
				<br>
				<br>
			</div>
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="images/bgindex/bgcentella.jpg" alt="IMG-BANNER">

						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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
					<div class="block1 wrap-pic-w">
						<img src="images/bgindex/bghya.jpg" alt="IMG-BANNER">

						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									HYALU CICA LINE	
								</span>
						
								<span class="block1-info text-white mt-3 fs-16 mt-2 trans-04" >
								  Soothing & Calming
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
					<div class="block1 wrap-pic-w">
						<img src="images/bgindex/bgbright.jpg" alt="IMG-BANNER">

						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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
					<div class="block1 wrap-pic-w">
						<img src="images/bgindex/bgtea.jpg" alt="IMG-BANNER">

						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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
					<div class="block1 wrap-pic-w">
						<img src="images/bgindex/bgpore.jpg" alt="IMG-BANNER">

						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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
					<div class="block1 wrap-pic-w">
						<img src="images/bgindex/bgprobio.jpg" alt="IMG-BANNER">

						<a href="product.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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
                <div class="col">
                    <hr class="border-dark" style="border-width: 4px;">
                </div>
                <div class="col-auto">
                    <h2 class="b1 text-center mb-0">Best Sellers</h2>
                </div>
                <div class="col">
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
					

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
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
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Sunscreens
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
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
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
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
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

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/Moistu.png">
										<div class="wrap-pic-w pos-relative">
											<img src="images/Moistu.png" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/Moistu.png">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/Moistu.png">
										<div class="wrap-pic-w pos-relative">
											<img src="images/moistu.png" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/Moistu.png">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/Moistu.png" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/Moistu.png">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
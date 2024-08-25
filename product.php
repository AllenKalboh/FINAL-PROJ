<?php
include ('db.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
<style>
	*{
		font-family: Poppins;
	}
/* Styling for the products */
.all-products-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

.product-item {
    border: 50px solid #ccc;
    padding: 20px;
    width: 200px;
    text-align: center;
}

.product-item h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.product-item p {
    font-size: 14px;
}

.btn {
    background-color: #000; /* Green background */
    border: none; /* Remove borders */
    color: white; /* White text */
    padding: 15px 32px; /* Top and bottom, left and right padding */
    text-align: center; /* Center text */
    text-decoration: none; /* Remove underline */
    display: inline-block; /* Align button inline with other elements */
    font-size: 16px; /* Font size */
    margin: 4px 2px; /* Margin around the button */
    cursor: pointer; /* Change cursor to pointer on hover */
    border-radius: 4px; /* Rounded corners */
}

.btn:hover {
    background-color: gray; /* Darker green on hover */
}

.name {
    font-size: 18px;
    margin-bottom: 20px;
    margin-top: 20px;
}
/* Style for the quantity input */
.quantity {
    border: solid black 1px;
    width: 60px; /* Adjust width as needed */
    margin: 10px auto; /* Centers the input field under the product */
    text-align: center; /* Centers the number inside the input */
    display: block; /* Ensures input field is displayed as a block element */
}

/* Style for the "Add to Cart" button */
.btn {
    margin-top: 10px; /* Adds spacing above the button */
}


/* Style for the "Add to Cart" button */
.btn {
    margin-top: 10px; /* Adds spacing above the button */
}

</style>
	<title>SkinLine Product</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="productss.css">
	<link rel="stylesheet" href="all-products.css">
<!--===============================================================================================-->
</head>

<style>
.all-products-container {
    padding: 20px;
    display: flex;
    justify-content: center; /* Center the grid horizontally */
}

.heading {
    text-align: center;
    font-size: 2em;
}

.swiper {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columns */
    gap: 20px;
    max-width: 1200px; /* Optional: Limit the maximum width of the grid */
    width: 100%;
}

.swiper-slide {
    border: 1px solid #000;
    padding: 10px;
    text-align: center;
    background-color: #fff;
    border-radius: 20px;
    box-sizing: border-box;
}

.swiper-slide img {
    width: 100%;
    height: 200px; /* Fixed height for consistency */
 
    margin-bottom: 15px;
	object-fit: contain;
}

/* Responsive grid: Adjust the number of columns based on screen size */
@media (max-width: 1200px) {
    .swiper {
        grid-template-columns: repeat(3, 1fr); /* 3 items per row */
    }
}

@media (max-width: 900px) {
    .swiper {
        grid-template-columns: repeat(2, 1fr); /* 2 items per row */
    }
}

@media (max-width: 600px) {
    .swiper {
        grid-template-columns: 1fr; /* 1 item per row */
    }
}
.pagination {
	margin-bottom: 30px;
    text-align: center;

}

.pagination a {
	font-family: Montserrat;
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    text-decoration: none;
    color: white;
    background-color: black;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

.pagination a:hover {
    background-color: gray;
    color: white;
}

.pagination a.active {
    font-weight: bold;
    color: white;
    background-color: pink;
}

.pagination a.disabled {
    color: #6c757d;
    pointer-events: none;
    cursor: default;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

/* Ensure the container of pagination is centered */
.pagination-container {
    display: flex;
    justify-content: center;
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
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
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
							<li>
								<a href="index.php">Home</a>
								
							</li>

							<li class="active-menu">
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
						

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart" >

						<a href="shoping-cart.php" style="color: black;">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						
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
				<a href="index.php"><img src="images/icons/log.png" alt="IMG-LOGO"></a>
			</div>


			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					
				</div>
				

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart" >
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
						<a href="helpfaq.html" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="profilepage.php" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="search_page.php" class="sc-btn">
   								 <i class="fas fa-search" style ="color: gray;"></i> 
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

	
	<!-- Product -->
<div class="bg0 m-t-23 p-b-30">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">

			
                <!-- SA PART NA TO MAGPRPRINT YUNG CATEGORY LANG NG MGA PRODUCTS -->
                 
                <section class="category">
                    <h1 class="heading">Shop by Category</h1>
                    <div class="category-slider">
                        <div class="category-wrapper">
                            <a href="category.php?category=Serum" class="category-slide">
                                <i class="fas fa-vial"></i>
                                <h3>Serum</h3>
                            </a>

                            <a href="category.php?category=toner" class="category-slide">
                                <i class="fas fa-wine-bottle"></i>
                                <h3>Toner</h3>
                            </a>

                            <a href="category.php?category=moisturizer" class="category-slide">
                                <i class="fas fa-pump-soap"></i>
                                <h3>Moisturizer</h3>
                            </a>

                            <a href="category.php?category=sunscreen" class="category-slide">
                                <i class="fas fa-sun"></i>
                                <h3>Sunscreen</h3>
                            </a>

                            <a href="category.php?category=cleanser" class="category-slide">
                                <i class="fas fa-soap"></i>
                                <h3>Cleanser</h3>
                            </a>

							<a href="category.php?category=mask" class="category-slide">
							<i class="fas fa-theater-masks"></i>
                                <h3>Masks</h3>
                            </a>

						
							
                        </div>
                    </div>
					
                </section>

			
            </div>
			
        </div>

        <!-- ALL PRODUCTS SECTION -->
        <!-- Load more -->
        
    </div>
	<h1 class="heading">All Products</h1>
</div>

<?php
// Database connection
// Assuming $conn is your MySQLi connection

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$productsPerPage = 6; // Number of products per page

// Calculate the offset
$offset = ($page - 1) * $productsPerPage;

// Fetch total number of products
$totalProductsResult = $conn->query("SELECT COUNT(*) as count FROM products");
$totalProducts = $totalProductsResult->fetch_assoc()['count'];
$totalPages = ceil($totalProducts / $productsPerPage);

// Fetch the products for the current page
$sql = "SELECT * FROM products LIMIT $offset, $productsPerPage";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/swiper/6.8.4/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
<section class="all-products-container">
    <div class="swiper products-slider">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($fetch_product = $result->fetch_assoc()) {
                $img01Path = 'uploads/' . basename($fetch_product['img_01']);
                ?>
                <div class="swiper-slide">
                    <form action="cart_action.php" method="post">
                        <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
                        <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                        <input type="hidden" name="price" value="<?= htmlspecialchars($fetch_product['price']); ?>">
                        <input type="hidden" name="image" value="<?= htmlspecialchars($fetch_product['img_01']); ?>">
                        <a href="quickview.php?pid=<?= htmlspecialchars($fetch_product['id']); ?>" class="fas fa-eye" style="color: black; font-size: 32px; margin-bottom: 10px;"></a>
                        <img src="<?= $img01Path; ?>" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                        <div class="name"><?= htmlspecialchars($fetch_product['product_name']); ?></div>
                        <input type="number" name="quantity" value="1" min="1" class="quantity">
                        <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
                    </form>
                </div>
                <?php
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }
        ?>
    </div>
</section>

<!-- Pagination Links -->
<!-- Pagination Links -->
<div class="pagination-container">
    <div class="pagination">
        <?php
        // Previous page link
        if ($page > 1) {
            echo '<a href="?page=' . ($page - 1) . '">««</a>';
        }

        // Page number links
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '"' . ($i == $page ? ' class="active"' : '') . '>' . $i . '</a>';
        }

        // Next page link
        if ($page < $totalPages) {
            echo '<a href="?page=' . ($page + 1) . '"> »»</a>';
        }
        ?>
    </div>
</div>

</body>
</html>


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
							<a href="helpfaq.html" class="stext-107 cl7 hov-cl1 trans-04" target=_blank>
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
<script>document.write(new Date().getFullYear());</script> All rights reserved |Made with <a href="https://www.youtube.com/watch?v=iVIS6KIQx78" target="_blank" style="text-decoration: none; color: white;">Brrrt Gratata</a>
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
</div>
		</div>
	</div>
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
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
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
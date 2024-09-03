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

							<li>
								<a href="tutorial.php">SkinHub</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>


							
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m" style="padding-right: 20px">
						
					
</div>

						
						</div>

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
							<i class="zmdi zmdi-user"></i>
						</a>

					
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
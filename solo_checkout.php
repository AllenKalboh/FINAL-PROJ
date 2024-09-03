<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skincare_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch POST data
$pid = isset($_POST['pid']) ? intval($_POST['pid']) : 0;
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

// Fetch user_id from session
$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

if (!$user_id) {
    die("<script>
            window.location.href = 'login.php';
          </script>");
}

// Prepare and execute the query
$sql = "SELECT id, product_name, price, description, img_01 FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $pid);
$stmt->execute();
$result = $stmt->get_result();

// Check if the product was found
if ($result->num_rows > 0) {
    // Output data of the product
    $row = $result->fetch_assoc();
    $id = htmlspecialchars($row["id"]);
    $img01Path = 'uploads/' . basename($row["img_01"]);
} else {
    echo "Product not found.";
    exit();
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="order_detailss.css"> <!-- Link to external CSS file if used -->
    <?php include('head.php'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Get the price element and quantity input
    const priceElement = document.getElementById('price');
    const quantityInput = document.getElementById('quantity');
    const basePrice = parseFloat(priceElement.dataset.price);

    // Function to update the displayed price
    function updatePrice() {
        const quantity = parseInt(quantityInput.value, 10) || 1;
        const totalPrice = basePrice * quantity;
        priceElement.textContent = `₱${totalPrice.toFixed(2)}`;
        document.getElementById('total_price').value = totalPrice.toFixed(2);
    }

    // Add event listener to quantity input
    quantityInput.addEventListener('input', updatePrice);

    // Initial price update
    updatePrice();
});
    </script>
</head>
<body>

<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over ₱500
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>

                    <a href="profilepage.php" class="flex-c-m trans-04 p-lr-25">
                        My Account
                    </a>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Shop</a></li>
                        <li><a href="tutorial.php">SkinHub</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo mobile -->
        <div class="logo-mobile">
            <a href="index.php"><img src="images/logoshet.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
                <a href="shoping-cart.php" style="color:black;">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </a>
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
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
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
            <li><a href="product.php">Shop</a></li>
            <li><a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</header>

<!-- Breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Single Purchase
        </span>
    </div>
</div>

<!-- Order Details Section -->
<!-- Order Details Section -->
<section class="single-product">
    <h1>Check Out</h1>
    <form action="chekwa.php" method="POST">
    <div class="product-image-container">
        <img src="<?= $img01Path; ?>" alt="Product Image">
    </div>
    <div class="product-info">
        <p><strong>Product Name:</strong> <?= htmlspecialchars($row["product_name"]); ?></p>
        <p><strong>Price:</strong> <span id="price" data-price="<?= htmlspecialchars($row["price"]); ?>">₱<?= htmlspecialchars($row["price"]); ?></span></p>
        <p><strong>Description:</strong> <?= htmlspecialchars($row["description"]); ?></p>
    </div>
    <div class="quantity-container">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="<?= htmlspecialchars($quantity); ?>" placeholder="1">
    </div>
    <!-- New Fields -->
    <div class="form-group">
        <label for="name">Receiver Name:</label>
        <input type="text" id="name" name="name" required placeholder="Your name or Receiver's Name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="asd@gmail.com">
    </div>
    <div class="form-group">
        <label for="method">Payment Method:</label>
        <select id="method" name="method" required>
            <option value="credit_card">Cash</option>
            <option value="paypal">G-Cash</option>
            <!-- Add other payment methods as needed -->
        </select>
    </div>
    <div class="form-group">
        <label for="address">Complete Address:</label>
        <textarea id="address" name="address" required placeholder="Blk and Lot, Street, Subdivision, Brgy., City"></textarea>
    </div>
    <!-- New Number Field -->
    <div class="form-group">
        <label for="number">Phone Number:</label>
        <input type="text" id="number" name="number" required placeholder="09123456789">
    </div>
    <input type="hidden" name="pid" value="<?= $pid; ?>">
    <input type="hidden" name="price" value="<?= htmlspecialchars($price); ?>">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id); ?>">
    <input type="hidden" name="product_name" value="<?= htmlspecialchars($row["product_name"]); ?>">
    <input type="hidden" name="total_price" id="total_price" value="0"> <!-- Initialize with a default value -->
    <div class="submit-button">
        <button type="submit">Place Order</button>
    </div>
</form>

</section>

<?php include('footer.php'); ?>
</body>
</html>

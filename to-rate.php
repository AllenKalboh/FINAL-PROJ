<?php
include('db.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

// Fetch completed orders for the logged-in user
$select_orders = $conn->prepare("SELECT id, product_ids, product_names, total_price, name, placed_on, payment_status, address, number FROM `orders` WHERE payment_status = 'Completed' AND user_id = ?");
$select_orders->bind_param("i", $user_id);
$select_orders->execute();
$result = $select_orders->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" type="image/png" href="images/inverted.png"/>
   <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="orderss.css">
    <link rel="stylesheet" href="to-rates.css">


</head>
<style>
  
</style> 
<!-- Header -->
<?php include ('header.php');?>
<body> 

<section class="orders">
    <h1 class="heading">Items to Rate</h1>
    <div class="orders-box-container bg-info">
        <?php
        if ($result->num_rows > 0) {
            while ($fetch_orders = $result->fetch_assoc()) {
                $product_names = explode(',', $fetch_orders['product_names']);
                
                if (empty($product_names)) {
                    echo '<p class="empty">No products found for this order.</p>';
                    continue;
                }
        ?>
        <div class="box">
            <p>Order Id: <span><?= htmlspecialchars($fetch_orders['id']); ?></span></p>
            <p>Total Price: <span>₱<?= htmlspecialchars($fetch_orders['total_price']); ?></span></p>
            <p>Name: <span><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
            <p>Date Created: <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
            <p>Status: <span><?= htmlspecialchars($fetch_orders['payment_status']); ?></span></p>
            <p>Address: <span><?= htmlspecialchars($fetch_orders['address']); ?></span></p>
            <p>Phone Number: <span><?= htmlspecialchars($fetch_orders['number']); ?></span></p>

            <!-- Display Product Rating Form -->
            <h2 class="subheading">Rate Product/s</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($product_names as $product_name) {
        $product_name = trim($product_name);

        // Query the product details by name
        $product_query = $conn->prepare("SELECT id, product_name, price, img_01 FROM products WHERE product_name = ?");
        $product_query->bind_param("s", $product_name);
        $product_query->execute();
        $product_result = $product_query->get_result();
        
        if ($product_result->num_rows > 0) {
            $product = $product_result->fetch_assoc();
            $imgPath = 'uploads/' . basename($product['img_01']); // Path to the product image
    ?>
    <tr>
        <td><img src="<?= htmlspecialchars($imgPath); ?>" alt="Product Image"></td>
        <td><?= htmlspecialchars($product['product_name']); ?></td>
        <td>₱<?= htmlspecialchars($product['price']); ?></td>
        <td>
            <!-- Button to open the modal -->
            <button type="button" class="btn btn-primary open-modal-btn" data-product-id="<?= htmlspecialchars($product['id']); ?>" data-order-id="<?= htmlspecialchars($fetch_orders['id']); ?>">Rate</button>
        </td>
       
           
        </td>
    </tr>
    <?php
        }
        $product_query->close();
    }
    ?>
</tbody>
            </table>
        </div>

        <div id="ratingModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Rate the Product</h2>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5" title="5 stars">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4" title="4 stars">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" title="3 stars">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2" title="2 stars">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1" title="1 star">&#9733;</label>
                </div>
                <button type="button" class="btn btn-primary" id="submitRatingBtn">Submit Rating</button>
            </div>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">No Completed Orders Found!</p>';
        }
        $select_orders->close();
        $conn->close();
        ?>
    </div>
</section>


</body>

<script>
// Get modal elements
const modal = document.getElementById("ratingModal");
const openModalBtns = document.querySelectorAll(".open-modal-btn");
const closeModalBtn = document.querySelector(".close-btn");
const submitRatingBtn = document.getElementById("submitRatingBtn");

// Open modal and set product ID
openModalBtns.forEach(button => {
    button.onclick = function() {
        const productId = this.getAttribute("data-product-id");
        const orderId = this.getAttribute("data-order-id");
        modal.setAttribute("data-product-id", productId);
        modal.setAttribute("data-order-id", orderId);
        modal.classList.add("show"); // Show with fade-in effect
    }
});

// Close modal
closeModalBtn.onclick = function() {
    modal.classList.remove("show"); // Hide with fade-out effect
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.classList.remove("show"); // Hide with fade-out effect
    }
}

// Handle star rating selection
const stars = document.querySelectorAll(".star-rating input");
stars.forEach(star => {
    star.addEventListener("change", function() {
        const rating = this.value;
        console.log("Selected rating:", rating); // For debugging
    });
});

// Handle submit rating button
submitRatingBtn.onclick = function() {
    const selectedStar = document.querySelector(".star-rating input:checked");
    if (selectedStar) {
        const rating = selectedStar.value;
        const productId = modal.getAttribute("data-product-id");
        const orderId = modal.getAttribute("data-order-id");
        
        fetch('rate_product.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'order_id': orderId,
                'product_id': productId,
                'rating': rating
            })
        })
        .then(response => response.text())
        .then(result => {
            alert(result);
            modal.classList.remove("show"); // Hide with fade-out effect after submission
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        alert("Please select a rating before submitting.");
    }
}
</script>
<?php include ('footer.php'); ?>


   <!-- Back to top -->
   <div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
   <!-- JS Scripts -->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <script src="vendor/animsition/js/animsition.min.js"></script>
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="vendor/select2/select2.min.js"></script>
   <script src="vendor/sweetalert/sweetalert.min.js"></script>
   <script src="js/main.js"></script>





</body>
</html>

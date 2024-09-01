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


</head>
<style>
   .box-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}
.box {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    transition: transform 0.2s, box-shadow 0.2s;
  
}
.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}
.box p {
    margin: 0 0 10px;
    color: black;
}
.box span {
    font-weight: bold;
}
.option-btn, .delete-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 16px;
    border-radius: 4px;
    color: black;
    text-decoration: none;
    font-size: 0.9rem;
    transition: background-color 0.2s;
    text-decoration: none;
}
.option-btn {
    background-color: #000000;
    text-decoration: none;
}
.option-btn:hover {
    background-color: gray;
    color:white;
    text-decoration: none;
}
.delete-btn {
    background-color: #dc3545;
    text-decoration: none;
}
.delete-btn:hover {
    background-color: #c82333;
    text-decoration: none;
    color: white;
}
.empty {
    text-align: center;
    color: #777;
    font-size: 1.2rem;
}
.orders-box-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.box {
    width: 500px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    
}

.table, .table th, .table td {
    border: 1px solid #ddd;
    color: black;
    
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    color: black;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: black;
}

.table td {
    color: black;
}

.subheading {
    margin-top: 20px;
    font-size: 1.5rem;
    color: black;
    
}

.btn-primary {
    background-color: #007bff;
    color: black;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style> 
<!-- Header -->
<?php include ('header.php');?>
<body> 

<section class="orders bg-info">
    <h1 class="heading">Items to Rate</h1>
    <div class="orders-box-container">
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
            <h2 class="subheading">Rate This Order</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Rating</th>
                        <th>Action</th>
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
                        <td><img src="<?= htmlspecialchars($imgPath); ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
                        <td><?= htmlspecialchars($product['product_name']); ?></td>
                        <td>₱<?= htmlspecialchars($product['price']); ?></td>
                        <td>
                            <form action="rate_product.php" method="post" style="display:inline;">
                                <input type="hidden" name="order_id" value="<?= htmlspecialchars($fetch_orders['id']); ?>">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>">
                                <select name="rating" required>
                                    <option value="">Select Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                        </td>
                        <td>
                                <button type="submit" class="btn btn-primary">Submit Rating</button>
                            </form>
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

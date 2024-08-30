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
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
$method = isset($_POST['method']) ? trim($_POST['method']) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']) : 0.0;
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
$product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;

// Check if all required fields are filled
if (!$name || !$email || !$quantity || !$method || !$address || !$user_id || !$product_name || !$price) {
    echo "<script>alert('Please fill in all required fields.'); window.location.href = 'product.php';</script>";
    exit();
}

// Format the product_names field to include quantity and price
$product_names = sprintf("%s - %dx ₱%.2f", $product_name, $quantity, $price);

// Prepare and execute the query to insert order details
$order_sql = "INSERT INTO orders (user_id, name, email, method, address, product_names, total_price, placed_on, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), 'Pending')";
$order_stmt = $conn->prepare($order_sql);
$order_stmt->bind_param("isssssd", $user_id, $name, $email, $method, $address, $product_names, $total_price);

if ($order_stmt->execute()) {
    echo "<script>alert('Order placed successfully!'); window.location.href = 'product.php';</script>";
} else {
    echo "<script>alert('Error placing order: " . $conn->error . "'); window.location.href = 'product.php';</script>";
}

$order_stmt->close();
$conn->close();
?>

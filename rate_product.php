<?php
include('db.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];

    // Validate inputs
    if (empty($order_id) || empty($product_id) || empty($rating)) {
        die("Invalid input.");
    }

    // Prepare and execute SQL query to insert rating into user_ratings
    $stmt = $conn->prepare("INSERT INTO user_ratings (user_id, product_id, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $product_id, $rating);

    if ($stmt->execute()) {
        // Optionally, update the rating in the products table or perform other actions
        echo "Rating submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

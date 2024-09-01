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

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert rating into user_ratings table
        $stmt = $conn->prepare("INSERT INTO user_ratings (user_id, product_id, rating) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $product_id, $rating);
        if (!$stmt->execute()) {
            throw new Exception("Error inserting rating into user_ratings: " . $stmt->error);
        }
        $stmt->close();

        // Calculate new average rating for the product
        $stmt = $conn->prepare("SELECT AVG(rating) AS avg_rating FROM user_ratings WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $average_rating = $row['avg_rating'];
        $stmt->close();

        // Update product rating in the products table
        $stmt = $conn->prepare("UPDATE products SET rating = ? WHERE id = ?");
        $stmt->bind_param("di", $average_rating, $product_id);
        if (!$stmt->execute()) {
            throw new Exception("Error updating product rating in products table: " . $stmt->error);
        }
        $stmt->close();

        // Commit transaction
        $conn->commit();
        echo "Rating submitted and updated successfully.";
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>

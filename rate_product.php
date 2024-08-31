<?php
include('db.php');
session_start(); // Ensure session is started

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = (int) $_POST['pid'];
    $rating = (int) $_POST['rating'];

    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['status'] = 'not_logged_in';
        header("Location: product.php");
        exit();
    }

    $userId = (int) $_SESSION['user_id']; // Get user ID from the session

    // Ensure rating is between 1 and 5
    if ($rating < 1 || $rating > 5) {
        $_SESSION['status'] = 'invalid_rating';
        header("Location: product.php");
        exit();
    }

    // Database connection check
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user has already rated this product
    $stmt = $conn->prepare("SELECT * FROM user_ratings WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userId, $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['status'] = 'already_rated';
        $stmt->close();
        $conn->close();
        header("Location: product.php");
        exit();
    }

    // Update rating in the products table
    $stmt = $conn->prepare("UPDATE products SET rating = rating + ? WHERE id = ?");
    $stmt->bind_param("ii", $rating, $pid);
    $stmt->execute();
    $stmt->close();

    // Insert rating into the user_ratings table to track user ratings
    $stmt = $conn->prepare("INSERT INTO user_ratings (user_id, product_id, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $userId, $pid, $rating);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    $_SESSION['status'] = 'success';
    header("Location: product.php");
    exit();
}
?>

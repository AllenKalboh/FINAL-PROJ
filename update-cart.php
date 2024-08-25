<?php
include('db.php');

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $cart_id = $_POST['cart_id'];
    $quantity = intval($_POST['quantity']); // Get the quantity from the form and ensure it's an integer

    // Validate quantity
    if ($quantity <= 0) {
        echo 'Invalid quantity!';
        exit();
    }

    // Update the cart item in the database
    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("iii", $quantity, $cart_id, $user_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Redirect with a success message
        header('Location: shoping-cart.php?status=success');
        exit();
    }else{
        header('Location: shoping-cart.php');
    }

    $stmt->close();
}

$conn->close();
?>

<?php
include('db.php');
include('session.php');
include('session-checker.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

if (isset($_GET['cart_id'])) {
    $cart_id = intval($_GET['cart_id']); // Sanitize the cart_id

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $cart_id, $_SESSION['user_id']);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Redirect to the shopping cart page after deletion
        header('Location: shoping-cart.php');
    } else {
        echo "Error: Item could not be deleted.";
    }

    $stmt->close();
}

$conn->close();
?>

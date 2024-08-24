<?php
session_start(); // Ensure session is started

include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['pid'];
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID

    // Fetch the product image from the products table
    $stmt = $conn->prepare("SELECT img_01 FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $image = $product['img_01'];

        // Check if the product is already in the cart for this user
        $check_cart = $conn->prepare("SELECT * FROM cart WHERE product_id = ? AND user_id = ?");
        $check_cart->bind_param("ii", $product_id, $user_id);
        $check_cart->execute();
        $cart_result = $check_cart->get_result();

        if ($cart_result->num_rows > 0) {
            // If the product is already in the cart, update the quantity
            $update_cart = $conn->prepare("UPDATE cart SET quantity = quantity + ? WHERE product_id = ? AND user_id = ?");
            $update_cart->bind_param("iii", $quantity, $product_id, $user_id);
            $update_cart->execute();
            $update_cart->close();
        } else {
            // If the product is not in the cart, insert it as a new item
            $add_to_cart = $conn->prepare("INSERT INTO cart (product_id, product_name, price, img_01, quantity, user_id) VALUES (?, ?, ?, ?, ?, ?)");
            $add_to_cart->bind_param("issdii", $product_id, $product_name, $price, $image, $quantity, $user_id);
            $add_to_cart->execute();
            $add_to_cart->close();
        }

        $check_cart->close();
    }

    $stmt->close();
    $conn->close();

    // Redirect to the shopping cart page
    header('Location: shoping-cart.php');
    exit();
}
?>

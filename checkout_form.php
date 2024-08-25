<?php
include('db.php');
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location:login.php');
    exit();
}

// Initialize message array and totals
$message = [];
$total_products = 0; // Default to 0 if not set
$total_price = 0; // Default to 0 if not set
$grand_total = isset($_SESSION['grand_total']) ? $_SESSION['grand_total'] : 0;

// Fetch cart items for the user
$cart_items = [];
$sql = "SELECT * FROM `cart` WHERE user_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch cart items
        $product_names = [];
        while ($row = $result->fetch_assoc()) {
            $cart_items[] = $row;
            $total_products += $row['quantity']; // assuming `quantity` field in cart
            $total_price += $row['price'] * $row['quantity']; // assuming `price` field in cart
            $product_names[] = $row['product_name']; // Collect product names
        }
        $grand_total = $total_price; // Update grand total
    } else {
        $message[] = 'Your Cart is Empty';
    }
    $stmt->close();
} else {
    $message[] = 'Failed to check cart.';
}

// Handle order placement
if (isset($_POST['order'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $method = filter_var($_POST['method'], FILTER_SANITIZE_STRING);
    $address = 'flat no. ' . filter_var($_POST['flat'], FILTER_SANITIZE_STRING) . ', ' . filter_var($_POST['street'], FILTER_SANITIZE_STRING) . ', ' . filter_var($_POST['city'], FILTER_SANITIZE_STRING) . ', ' . filter_var($_POST['state'], FILTER_SANITIZE_STRING) . ', ' . filter_var($_POST['country'], FILTER_SANITIZE_STRING) . ' - ' . filter_var($_POST['pin_code'], FILTER_SANITIZE_STRING);

    if ($total_products > 0) {
        // Join product names into a single string
        $product_names_str = implode(', ', $product_names);

        // Insert order into the database
        $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, product_names) VALUES(?,?,?,?,?,?,?,?,?)");
        $insert_order->bind_param("issssssis", $user_id, $name, $number, $email, $method, $address, $total_products, $total_price, $product_names_str);
        $insert_order->execute();

        // Delete cart items after successful order placement
        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart->bind_param("i", $user_id);
        $delete_cart->execute();

        $message[] = 'Order placed successfully!';
    } else {
        $message[] = 'Your cart is empty';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="checkout-orders">
    <form action="" method="POST">
        <h3>Your Orders</h3>
        <div class="display-orders">
            <?php if ($total_products > 0): ?>
                <p> <?= htmlspecialchars($total_products); ?> items in cart </p>
                <div class="order-list">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="order-item">
                            <p><?= htmlspecialchars($item['product_name']); ?> Quantity: <?= htmlspecialchars($item['quantity']); ?> x ₱<?= htmlspecialchars(number_format($item['price'], 2)); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="empty">Your cart is empty!</p>
            <?php endif; ?>
            <input type="hidden" name="total_products" value="<?= htmlspecialchars($total_products); ?>">
            <input type="hidden" name="total_price" value="<?= htmlspecialchars($total_price); ?>">
            <div class="grand-total">Grand Total : <span>₱<?= htmlspecialchars(number_format($grand_total, 2)); ?></span></div>
        </div>

        <h3>Place your orders</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Name:</span>
                <input type="text" name="name" placeholder="Enter Your Name" class="box" maxlength="20" required>
            </div>
            <div class="inputBox">
                <span>Number:</span>
                <input type="number" name="number" placeholder="Enter Your Number" class="box" min="0" max="99999999999" onkeypress="if(this.value.length == 12) return false;" required>
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" name="email" placeholder="Enter Your Email" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Type of Payment:</span>
                <select name="method" class="box" required>
                    <option value="Cash on Delivery">Cash On Delivery</option>
                    <option value="Gcash">Gcash</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" name="flat" placeholder="Flat No." class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Street:</span>
                <input type="text" name="street" placeholder="Street Name" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>City:</span>
                <input type="text" name="city" placeholder="City" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Province:</span>
                <input type="text" name="state" placeholder="Province" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>Country:</span>
                <input type="text" name="country" placeholder="Country" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
                <span>ZIP CODE:</span>
                <input type="number" name="pin_code" placeholder="ZIP Code" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
            </div>
        </div>

        <input type="submit" name="order" class="btn <?= ($total_price > 1) ? '' : 'disabled'; ?>" value="Place Order">
    </form>
</section>

</body>
</html>

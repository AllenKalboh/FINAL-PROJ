<?php
include('db.php');
include('session.php');
include('session-checker.php');

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['pid'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];  // Using 'price' instead of 'product_price'
    $product_image = $_POST['image'];
    $quantity = $_POST['quantity'];

    // Insert the product into the cart table
    $sql = "INSERT INTO cart (product_id, product_name, price, product_img, quantity)
            VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Product added to cart successfully!');
                window.location.href = 'shoping-cart.php';
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

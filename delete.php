<?php
$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "skincare_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the query string
if (isset($_GET['id'])) {
    $productId = intval($_GET['id']); // Convert to integer to prevent SQL injection

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully.'); window.location.href='product_list.php';</script>";
    } else {
        echo "<script>alert('Error deleting product.'); window.location.href='product_list.php';</script>";
    }

    // Close statement
    $stmt->close();
} else {
    echo "<script>alert('No product ID provided.'); window.location.href='product_list.php';</script>";
}

// Close connection
$conn->close();
?>

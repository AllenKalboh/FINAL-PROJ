<?php
session_start();

try {
    // Database connection
    $dsn = "mysql:host=localhost;dbname=skincare_db;charset=utf8";
    $username = "root";
    $password = "";

    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch POST data and sanitize
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $total_price = filter_input(INPUT_POST, 'total_price', FILTER_VALIDATE_FLOAT);

    // Validate required fields
    if (!$user_id || !$name || !$email || !$method || !$address || !$number || !$pid || !$total_price) {
        throw new Exception("Please fill in all required fields.");
    }

    // Fetch the product name from the products table
    $product_name = '';
    $stmt = $pdo->prepare("SELECT product_name FROM products WHERE id = :pid");
    $stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product_name = $row['product_name'];
    } else {
        throw new Exception("Product not found.");
    }

    // Begin transaction
    $pdo->beginTransaction();

    // Prepare and execute the insert query
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, name, number, email, method, address, product_names, total_price, placed_on, payment_status, product_ids)
                           VALUES (:user_id, :name, :number, :email, :method, :address, :product_names, :total_price, NOW(), 'Pending', :product_ids)");

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':number', $number, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':method', $method, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':product_names', $product_name, PDO::PARAM_STR);
    $stmt->bindParam(':total_price', $total_price, PDO::PARAM_STR);
    $stmt->bindParam(':product_ids', $pid, PDO::PARAM_INT);

    $stmt->execute();

    // Commit transaction
    $pdo->commit();

    echo "<p>Order placed successfully! Thank you for your purchase.</p>";

} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "<p>Error: " . $e->getMessage() . "</p>";
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
} finally {
    $pdo = null; // Close the connection
}
?>

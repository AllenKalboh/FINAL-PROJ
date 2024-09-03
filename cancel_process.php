<?php

include('db.php'); // Ensure this file contains the MySQLi connection setup

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the order ID from the POST request
    $order_id = $_POST['order_id'];

    $user_id = $_SESSION['user_id'];

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Prepare and execute the statement to get the order details
        $sql = "SELECT * FROM orders WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                // Fetch order details
                $order = $result->fetch_assoc();
                
                // Insert the order into cancelled_orders
                $sql_insert = "INSERT INTO cancelled_orders (id, user_id, name, email, number, address, method, product_names, total_price, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                if ($stmt_insert = $conn->prepare($sql_insert)) {
                    $stmt_insert->bind_param("isssssssss", $order['id'], $order['user_id'], $order['name'], $order['email'], $order['number'], $order['address'], $order['method'], $order['product_names'], $order['total_price'], $order['payment_status']);
                    $stmt_insert->execute();
                }

                // Update the payment status in the orders table
                $sql_update = "UPDATE cancelled_orders SET payment_status = 'cancelled' WHERE id = ?";
                if ($stmt_update = $conn->prepare($sql_update)) {
                    $stmt_update->bind_param("i", $order_id);
                    $stmt_update->execute();
                }

                // Delete the order from the orders table
                $sql_delete = "DELETE FROM orders WHERE id = ?";
                if ($stmt_delete = $conn->prepare($sql_delete)) {
                    $stmt_delete->bind_param("i", $order_id);
                    $stmt_delete->execute();
                }

                // Commit the transaction
                $conn->commit();
                header("Location: orders.php");
            } else {
                echo 'Order not found.';
            }
        }

    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        echo 'Error cancelling order: ' . $e->getMessage();
    }

    $conn->close();
}
?>

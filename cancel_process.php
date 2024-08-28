<?php
include('db.php'); // Ensure this file contains the MySQLi connection setup

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['order_id']) && !empty($_POST['order_id'])) {
        $order_id = $_POST['order_id'];

        // Start a transaction
        $conn->begin_transaction();

        try {
            // Step 1: Move the order from 'orders' to a temporary table
            $move_order_sql = "INSERT INTO cancelled_orders (id, placed_on, name, email, number, address, method, product_names, total_price, payment_status)
                                SELECT id,  placed_on, name, email, number, address, method, product_names, total_price, payment_status 
                                FROM orders 
                                WHERE id = ?";

            if ($stmt = $conn->prepare($move_order_sql)) {
                $stmt->bind_param("i", $order_id);
                $stmt->execute();
                $stmt->close();

                // Step 2: Delete the order from 'orders'
                $delete_order_sql = "DELETE FROM orders WHERE id = ?";
                if ($stmt = $conn->prepare($delete_order_sql)) {
                    $stmt->bind_param("i", $order_id);
                    $stmt->execute();
                    $stmt->close();

                    // Step 3: Move the order from the temporary table to 'cancelled_orders'
                    $insert_cancelled_order_sql = "INSERT INTO cancelled_orders (id,  placed_on, name, email, number, address, method, product_names, total_price, payment_status)
                                                    SELECT id,  placed_on, name, email, number, address, method, product_names, total_price, payment_status 
                                                    FROM cancelled_orders 
                                                    WHERE id = ?";

                    if ($stmt = $conn->prepare($insert_cancelled_order_sql)) {
                        $stmt->bind_param("i", $order_id);
                        $stmt->execute();
                        $stmt->close();

                        // Commit the transaction
                        $conn->commit();

                        // Successfully moved and deleted
                        echo json_encode(['success' => true]);
                        exit;
                    } else {
                        throw new Exception('Failed to insert into cancelled_orders.');
                    }
                } else {
                    throw new Exception('Failed to delete order from orders.');
                }
            } else {
                throw new Exception('Failed to move order to cancelled_orders.');
            }
        } catch (Exception $e) {
            // Rollback the transaction in case of error
            $conn->rollback();
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Order ID is required.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>

<<<<<<< Updated upstream
=======
<?php
// Database connection setup
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "skincare_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Return JSON response with error
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Check if order_id is set
if (isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // Prepare an update statement
    $stmt = $conn->prepare("UPDATE orders SET payment_status = ? WHERE id = ?");
    $new_status = 'Cancelled';
    $stmt->bind_param('si', $new_status, $order_id);

    if ($stmt->execute()) {
        // Return JSON response with success
        echo json_encode(['success' => true, 'message' => 'Order cancelled successfully.']);
    } else {
        // Return JSON response with error
        echo json_encode(['success' => false, 'message' => 'Error updating record: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    // Return JSON response with error
    echo json_encode(['success' => false, 'message' => 'Order ID is not set.']);
}

// Close the connection
$conn->close();
?>
>>>>>>> Stashed changes

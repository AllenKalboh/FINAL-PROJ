<?php
/*
notes im so high im lazy to open notes
peralta's plan
-since dito makikita yung order ie yung laman, computation, status ng order kung to ship and to receive na
-i think sa admin to, then syempre need din may makita yung user kung ano order nila then gagawa din tayo ng php para doon
anyway nasa isip ko is button nlng gamitin natin, na maglalagay ng value button sa table  na magiindicate na to ship na then another button for to receive un na sa isip ko
well yun lng nasa isip ko,
*/
?>


<?php
include('db.php');

?>
<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view your orders.");
}

// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

// Query to fetch user and order details for the logged-in user using LEFT JOIN
$sql = "
    SELECT orders.order_id, orders.product_name, orders.total_price, orders.order_date, orders.status, users.username, users.email 
    FROM orders 
    LEFT JOIN users ON orders.user_id = users.user_id 
    WHERE users.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch all orders into an array
$orders = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Your Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-button {
    position: fixed; /* Fixed position relative to the viewport */
    top: 20px; /* Distance from the top */
    left: 20px; /* Distance from the left */
    display: flex;
    align-items: center;
    color: #ffffff; /* Blue color for the icon */
    text-decoration: none;
    font-size: 18px; /* Font size for the icon */
    padding: 8px; /* Padding around the button */
    border: 1px solid #000000; /* Border color */
    border-radius: 4px; /* Rounded corners */
    background-color: #494949; /* Background color */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    z-index: 1000; /* Ensure it is on top of other elements */
}

.back-button i {
    font-size: 20px; /* Font size for the icon */
}

.back-button:hover {
    transform: scale(1.10);
    transition: 0.3s;
}
    </style>
</head>
<body>
<a href="profilepage.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>
<div class="container">
    <h1>Your Orders</h1>

    <?php if (count($orders) > 0): ?>
        <h2>User Details</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($orders[0]['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($orders[0]['email']); ?></p>

        <table>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['total_ price']); ?></td>
                    <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                    <!---dito sa status naiisip ko na gagamit tayo ng buttons na mag iindicate kung to ship, to receive adn received na yung item welp pagmay time nlng natin gawin--->
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
</div>

</body>
</html>


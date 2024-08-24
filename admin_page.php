
<?php
include ('db.php'); // Include your database connection

// Count the number of users
$select_users = $conn->prepare("SELECT COUNT(*) as total_users FROM `users`");
$select_users->execute();
$select_users->bind_result($total_users);
$select_users->fetch();
$select_users->close();

// Count the number of products
$select_products = $conn->prepare("SELECT COUNT(*) as total_products FROM `products`");
$select_products->execute();
$select_products->bind_result($total_products);
$select_products->fetch();
$select_products->close();

// Count the number of admin accounts
$select_admins = $conn->prepare("SELECT COUNT(*) as total_admins FROM `admins`");
$select_admins->execute();
$select_admins->bind_result($total_admins);
$select_admins->fetch();
$select_admins->close();

$select_orders = $conn->prepare("SELECT COUNT(*) as total_orders FROM `orders`");
$select_orders->execute();
$select_orders->bind_result($total_orders);
$select_orders->fetch();
$select_orders->close();

// $select_orders = $conn->prepare("SELECT COUNT(*) as total_orders FROM `orders`");            MESSAGES
// $select_orders->execute();
// $select_orders->bind_result($total_orders);
// $select_orders->fetch();
// $select_orders->close();

// Get the first and last day of the current month
$firstDayOfMonth = date('Y-m-01');
$lastDayOfMonth = date('Y-m-t');

// Query to count completed orders for each day in the current month
$sql = "SELECT DATE(order_date) AS date, COUNT(*) AS total_sales FROM orders WHERE status = 'completed' AND order_date BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth' GROUP BY DATE(order_date)";
$result = $conn->query($sql);

$dates = [];
$sales = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date'];
    $sales[] = $row['total_sales'];
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="admin_page.css">
</head>
<body>
    <div class="sidebar">
    <img src="images/inverted.png" alt="">
        <a href="admin_page.php"><i class="fas fa-home"></i><span> Home</span></a>
        <a href="user_message.php"><i class="fas fa-envelope"></i><span> Messages</span></a>
        <a href="product_list.php"><i class="fas fa-list-ul"></i><span> Products List</span></a>
        <a href="add_product.php"><i class="fas fa-plus"></i><span> Add Products</span></a>
        <a href="admin_orders.php"><i class="fas fa-receipt"></i><span> Orders</span></a>
        <a href="user_list.php"><i class="fas fa-users"></i><span> User List</span></a>
        <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
    </div>

    <section class="dashboard">
        <h1 class="heading">Admin Dashboard</h1>

        <div class="box-container">
            <div class="box">
                <h3><?= $total_users; ?></h3>
                <p>Users</p>
            </div>
            
            <div class="box">
                <h3><?= $total_products; ?></h3>
                <p>Total Products</p>
            </div>

            <div class="box">
                <h3><?= $total_admins; ?></h3>
                <p>Admin</p>
            </div>

            <div class="box">
                <h3><?= $total_orders; ?></h3>
                <p>Orders</p>
            </div>
        </div>
    </section>

    <div class="dashboard-stats">
        <h2>Sales This Month</h2>
        <p>Total Sales: <?php echo array_sum($sales); ?> Sales</p>
        <canvas id="salesChart"></canvas>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');

        // Define the data for the chart
        const data = {
            labels: <?php echo json_encode($dates); ?>, // X-axis labels (dates)
            datasets: [{
                label: 'Number of Sales',
                data: <?php echo json_encode($sales); ?>, // Data points
                borderColor: 'rgba(255, 255, 255, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                pointStyle: '', // Point style (can be 'circle', 'rect', 'triangle', 'star', 'line', 'cross', 'crossRot', 'dash', 'rectRounded', 'rectRot')
                pointRadius: 10, // Radius of points
                pointHoverRadius: 20 // Radius of points on hover
            }]
        };

        // Define the configuration for the chart
        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => '' + ctx.chart.data.datasets[0].pointStyle,
                        color: '#00bcd4', // Title color
                        font: {
                            size: 16 // Font size for the title
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e1e1e',
                        bodyColor: '#ffffff',
                        borderColor: '#333',
                        borderWidth: 1
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false // Hide grid lines for x-axis
                        },
                        ticks: {
                            color: '#b0bec5' // Color for x-axis labels
                        }
                    },
                    y: {
                        grid: {
                            color: '#333' // Darker grid lines for y-axis
                        },
                        ticks: {
                            color: '#b0bec5' // Color for y-axis labels
                        },
                        beginAtZero: true
                    }
                }
            }
        };

        // Create the chart
        const salesChart = new Chart(ctx, config);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

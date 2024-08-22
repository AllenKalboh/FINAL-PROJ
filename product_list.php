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

if (isset($_POST['delete'])) {
    $productId = $_POST['product_id'];

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
}
// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="product_lists.css">
    <style>
        /* Button Styles */
/* Button Styles */
.btn {
    display: inline-flex; /* Use flexbox to align items horizontally */
    align-items: center; /* Center align items vertically */
    padding: 5px 8px;
    border-radius: 4px;
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    margin: 0 5px;
    transition: background-color 0.3s, color 0.3s;
    text-align: center;
    width: 28px;
}

.edit-btn {
    background-color: #4CAF50; /* Green */
}

.edit-btn:hover {
    background-color: #45a049;
}

.delete-btn {
    background-color: #f44336; /* Red */
}

.delete-btn:hover {
    background-color: #e53935;
}

.btn i {
    margin-right: 5px; /* Space between icon and text */
}

.btn:active {
    transform: scale(0.98); /* Slightly scale down the button on click */
}
/* Table column widths */
table th:nth-child(4),
table td:nth-child(4) {
    width: 300px; /* Adjust the width of the Description column */
}

table th:nth-child(8),
table td:nth-child(8) {
    width: 150px; /* Adjust the width of the Action column */
}

/* Optional: Adjust table layout for better control */
table {
    table-layout: fixed; /* Ensures columns adhere to the specified widths */
}

    </style>
</head>
<body>

    <a href="admin_page.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

<h1 class="heading">Product List</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image 01</th>
            <th>Image 02</th>
            <th>Image 03</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row["id"]);
                $img01Path = 'uploads/' . basename($row["img_01"]);
                $img02Path = 'uploads/' . basename($row["img_02"]);
                $img03Path = 'uploads/' . basename($row["img_03"]);

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
                echo "<td> ₱" . htmlspecialchars($row["price"]) . "</td>";
                echo "<td><center>" . htmlspecialchars($row["description"]) . "</td>";
                echo "<td><img src='$img01Path' alt='Image 01'></td>";
                echo "<td><img src='$img02Path' alt='Image 02'></td>";
                echo "<td><img src='$img03Path' alt='Image 03'></td>";
                echo "<td>
                    <a href='edit.php?id=$id' class='btn edit-btn'> <i class='fas fa-edit'></i> </a>
                    <a href='delete.php?id=$id' class='btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this product?\");'> <i class='fas fa-trash'></i></a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No products found</td></tr>";
        }
        ?>
    </tbody>
</table>


<?php
$conn->close();
?>

</body>
</html>

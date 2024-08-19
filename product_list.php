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
<link rel="stylesheet" href="product_list.css">
</head>
<body>

    <a href="adminpage.php" class="back-button">
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
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["price"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["description"]) . "</td>";

                // Output images
                $img01Path = 'uploads/' . basename($row["img_01"]);
                $img02Path = 'uploads/' . basename($row["img_02"]);
                $img03Path = 'uploads/' . basename($row["img_03"]);

                echo "<td><img src='" . $img01Path . "' alt='Image 01'></td>";
                echo "<td><img src='" . $img02Path . "' alt='Image 02'></td>";
                echo "<td><img src='" . $img03Path . "' alt='Image 03'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No products found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$conn->close();
?>

</body>
</html>

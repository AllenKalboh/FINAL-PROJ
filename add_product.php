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

if (isset($_POST['add_product'])) {
    // Retrieve form data
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $description = $_POST['details'];

    // Handle file uploads
    $upload_dir = __DIR__ . "/uploads/";
    $image_paths = [];
    
    // Ensure directory exists and is writable
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    for ($i = 1; $i <= 3; $i++) {
        $image_name = $_FILES["img_0$i"]['name'];
        $image_tmp_name = $_FILES["img_0$i"]['tmp_name'];
        $image_path = $upload_dir . basename($image_name);

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image_paths[] = $image_path;
        } else {
            $image_paths[] = null; // If upload fails, store null
        }
    }

    // Prepare SQL query
    $sql = "INSERT INTO products (product_name, price, description, img_01, img_02, img_03) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param(
            'sdssss',
            $product_name,
            $product_price,
            $description,
            $image_paths[0],
            $image_paths[1],
            $image_paths[2]
        );

        if ($stmt->execute()) {
            echo "<script>alert('Added Succesfully')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SL Admin - Add Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="add_productsss.css">
   <link rel="icon" type="image/png" href="images/icons/logoinvert.png"/>
</head>
<body>
<style>
    .sidebar {
    background-color: #232323;
}
.sidebar a:hover {
    background-color: #575757;
}
</style>
<div class="sidebar">
<img src="images/icons/logoinvert.png" alt="logosidebar" style="width:140px;">
        <a href="admin_page.php"><i class="fas fa-home"></i><span> Home</span></a>
        <a href="user_message.php"><i class="fas fa-envelope"></i><span> Messages</span></a>
        <a href="product_list.php"><i class="fas fa-list-ul"></i><span> Products List</span></a>
        <a href="add_product.php"><i class="fas fa-plus"></i><span> Add Products</span></a>
        <a href="admin_orders.php"><i class="fas fa-receipt"></i><span> Orders Status</span></a>
        <a href="user_list.php"><i class="fas fa-users"></i><span> User List</span></a>
        <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
    </div>
<section class="add-products">
   <h1 class="heading">Add Product</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Product Name (Required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter Product Name" name="name">
         </div>
         <div class="inputBox">
            <span>Product Price (Required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="Enter Product Price" name="price">
         </div>
         <div class="inputBox">
            <span>Image 01 (Required)</span>
            <input type="file" name="img_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
         </div>
         <div class="inputBox">
            <span>Image 02 (Required)</span>
            <input type="file" name="img_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
         </div>
         <div class="inputBox">
            <span>Image 03 (Required)</span>
            <input type="file" name="img_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
         </div>
         <div class="inputBox">
            <span>Product Description (Required)</span>
            <textarea name="details" placeholder="Enter Product Details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>

      <input type="submit" value="Add Product" class="btn" name="add_product">
   </form>
</section>



</body>
</html>

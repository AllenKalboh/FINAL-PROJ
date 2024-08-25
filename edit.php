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

if (isset($_POST['update_product'])) {
    // Retrieve form data
    $product_id = $_POST['id']; // Assuming the product ID is sent through a hidden input
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
        if (isset($_FILES["img_0$i"]) && $_FILES["img_0$i"]['error'] == UPLOAD_ERR_OK) {
            $image_name = $_FILES["img_0$i"]['name'];
            $image_tmp_name = $_FILES["img_0$i"]['tmp_name'];
            $image_path = $upload_dir . basename($image_name);

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $image_paths[$i - 1] = $image_name; // Save only the file name, not the full path
            } else {
                $image_paths[$i - 1] = null; // If upload fails, store null
            }
        } else {
            // If no file was uploaded or there was an upload error
            $image_paths[$i - 1] = null; // Default to null if no new image was uploaded
        }
    }

    
    // Prepare SQL query
    $sql = "UPDATE products SET 
            product_name = ?, 
            price = ?, 
            description = ?, 
            img_01 = COALESCE(?, img_01), 
            img_02 = COALESCE(?, img_02), 
            img_03 = COALESCE(?, img_03) 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param(
            'sdssssi',
            $product_name,
            $product_price,
            $description,
            $image_paths[0],
            $image_paths[1],
            $image_paths[2],
            $product_id
        );

        if ($stmt->execute()) {
            echo "<script>
                    alert('Updated Successfully');
                    window.location.href = 'product_list.php';
                  </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close(); // Close connection only after all operations are complete
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Product</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="add_productsss.css">
</head>
<style> 

.back-button {
    position: fixed;
    top: 20px;
    left: 20px;
    display: flex;
    align-items: center;
    color: #ffffff;
    text-decoration: none;
    font-size: 18px;
    padding: 8px;
    border: 1px solid #000000;
    border-radius: 4px;
    background-color: #494949;
    transition: background-color 0.3s, color 0.3s;
    z-index: 1000;
}

.back-button i {
    font-size: 20px;
}

.back-button:hover {
    transform: scale(1.10);
    transition: 0.3s;
}

</style>
<body>

<a href="product_list.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

<section class="add-products">
   <h1 class="heading">Update Product</h1>

   <?php
   // Retrieve product details for editing
   $product_id = $_GET['id']; // Assuming the product ID is passed via URL parameter
   $sql = "SELECT * FROM products WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param('i', $product_id);
   $stmt->execute();
   $result = $stmt->get_result();
   $product = $result->fetch_assoc();
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']); ?>">
      <div class="flex">
         <div class="inputBox">
            <span>Product Name (Required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter Product Name" name="name" value="<?= htmlspecialchars($product['product_name']); ?>">
         </div>
         <div class="inputBox">
            <span>Product Price (Required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="Enter Product Price" name="price" value="<?= htmlspecialchars($product['price']); ?>">
         </div>
         <div class="inputBox">
            <span>Image 01</span>
            <input type="file" name="img_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
            <?php if ($product['img_01']): ?>
           
            <?php endif; ?>
         </div>
         <div class="inputBox">
            <span>Image 02</span>
            <input type="file" name="img_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
            <?php if ($product['img_02']): ?>
           
            <?php endif; ?>
         </div>
         <div class="inputBox">
            <span>Image 03</span>
            <input type="file" name="img_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
            <?php if ($product['img_03']): ?>
            
            <?php endif; ?>
         </div>
         <div class="inputBox">
            <span>Product Description (Required)</span>
            <textarea name="details" placeholder="Enter Product Details" class="box" required maxlength="500" cols="30" rows="10"><?= htmlspecialchars($product['description']); ?></textarea>
         </div>
      </div>

      <input type="submit" value="Update Product" class="btn" name="update_product">
   </form>
</section>

</body>
</html>
<?php
include ('db.php'); // Include the database connection file

// Ensure you have error handling in place for database connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Category</title>
   
   <!-- Font Awesome CDN link for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="styless.css">

   <!-- Inline styles for buttons -->
   <style> 
   .back-button, .home-button {
       position: fixed;
       top: 20px;
       left: 20px;
       display: flex;
       align-items: center;
       color: #ffffff;
       text-decoration: none;
       font-size: 18px;
       padding: 8px;
       border-radius: 4px;
       background-color: #494949;
       transition: background-color 0.3s, color 0.3s;
       z-index: 1000;
   }
   .home-button {
       margin-left: 50px; /* Offset for the home button */
   }
   .back-button i, .home-button i {
       font-size: 20px;
   }
   .back-button:hover, .home-button:hover {
       transform: scale(1.10);
       transition: 0.3s;
   }
   </style>
</head>
<body>
    <!-- Back and Home buttons -->
    <a href="product.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>
    <a href="index.php" class="home-button">
        <i class="fas fa-home"></i>
    </a>

    <!-- Products section -->
    <section class="products">
        <h1 class="heading">Products</h1>

        <div class="box-container">
        <?php
        // Fetch products based on category
        $category = $_GET['category'];
        $select_products = $conn->query("SELECT * FROM `products` WHERE product_name LIKE '%$category%'");

        if($select_products->num_rows > 0){
            while($fetch_product = $select_products->fetch_assoc()){
                // Construct the image path
                $img01Path = 'uploads/' . basename($fetch_product["img_01"]);
                ?>

                <!-- Product form -->
                <form action="" method="post" class="box">
                   <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                   <input type="hidden" name="name" value="<?= $fetch_product['product_name']; ?>">
                   <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                   <input type="hidden" name="image" value="<?= $fetch_product['img_01']; ?>">
                   <img src="<?= $img01Path; ?>" alt="<?= $fetch_product['product_name']; ?>">
                   <a href="quickview.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                   <div class="name"><?= $fetch_product['product_name']; ?></div>
                   <div class="flex">
                      <div class="price"><span>₱</span><?= $fetch_product['price']; ?></div>
                      <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                   </div>
                   <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
                </form>

                <?php
            }
        } else {
            echo '<p class="empty">No products found!</p>';
        }
        ?>
        </div>
    </section>
</body>
</html>

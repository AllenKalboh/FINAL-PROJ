<?php
include ('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Category</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styless.css">

</head>
<style> 
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
<body>
<a href="product.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>

<section class="products">

   <h1 class="heading">Products</h1>

   <div class="box-container">

   <?php
$category = $_GET['category'];
$select_products = $conn->query("SELECT * FROM `products` WHERE product_name LIKE '%$category%'");

if($select_products->num_rows > 0){
    while($fetch_product = $select_products->fetch_assoc()){
        // Construct the image path
        $img01Path = 'uploads/' . basename($fetch_product["img_01"]);

        // Debugging Step: Display the image path
        echo "<!-- Image Path: $img01Path -->";
?>

<form action="" method="post" class="box">
   <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
   <input type="hidden" name="name" value="<?= $fetch_product['product_name']; ?>">
   <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
   <input type="hidden" name="image" value="<?= $fetch_product['img_01']; ?>">
   <img src="<?= $img01Path; ?>" alt="<?= $fetch_product['product_name']; ?>">
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

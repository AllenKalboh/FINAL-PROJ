<?php

include ('db.php');

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Page</title>
   
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

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="Search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="products" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">

   <?php
if (isset($_POST['search_box']) || isset($_POST['search_btn'])) {
   $search_box = $_POST['search_box'];

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
   $searchTerm = "%$search_box%";
   $stmt->bind_param("s", $searchTerm);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
       while ($fetch_product = $result->fetch_assoc()) {
           // Fetch the image path
           $img01Path = 'uploads/' . basename($fetch_product["img_01"]);
           ?>
           <form action="" method="post" class="box">
               <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
               <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_product['product_name']); ?>">
               <input type="hidden" name="price" value="<?= htmlspecialchars($fetch_product['price']); ?>">
               <input type="hidden" name="image" value="<?= htmlspecialchars($fetch_product['img_01']); ?>">
               <img src="<?= htmlspecialchars($img01Path); ?>" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
               <div class="name"><?= htmlspecialchars($fetch_product['product_name']); ?></div>
               <div class="flex">
                   <div class="price"><span>₱</span><?= htmlspecialchars($fetch_product['price']); ?><span>/-</span></div>
                   <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
               </div>
               <input type="submit" value="Add to Cart" class="btn" name="add_to_cart" id="atc-btn">
           </form>
           <?php
       }
   } else {
       echo "<script>alert('No Product Found');</script>";
   }
}
   ?>

   </div>

</section>


<script src="js/script.js"></script>

</body>
</html>
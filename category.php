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
   <link rel="stylesheet" href="category.css">

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
.home-button {
    position: fixed; /* Fixed position relative to the viewport */
    top: 20px; /* Distance from the top */
    left: 20px; /* Distance from the left */
    display: flex;
    align-items: center;
    color: #ffffff; /* Blue color for the icon */
    text-decoration: none;
    font-size: 18px; /* Font size for the icon */
    padding: 8px; /* Padding around the button */

    border-radius: 4px; /* Rounded corners */
    background-color: #494949; /* Background color */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    z-index: 1000; /* Ensure it is on top of other elements */
    margin-left: 50px;
}

.home-button i {
    font-size: 20px; /* Font size for the icon */
}

.home-button:hover {
    transform: scale(1.10);
    transition: 0.3s;
}


</style>
<body>
<a href="product.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>
    <a href="index.php" class="home-button">
        <i class="fas fa-home"></i>
    </a>
<section class="products">
    <div class="bg0 m-t-23 p-b-30">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">

			
                <!-- SA PART NA TO MAGPRPRINT YUNG CATEGORY LANG NG MGA PRODUCTS -->
				
                <section class="category">
                  
                    <div class="category-slider">
                        <div class="category-wrapper">
                            <a href="category.php?category=Serum" class="category-slide">
                                <i class="fas fa-vial"></i>
                                <h3>Serum</h3>
                            </a>

                            <a href="category.php?category=toner" class="category-slide">
                                <i class="fas fa-wine-bottle"></i>
                                <h3>Toner</h3>
                            </a>

                            <a href="category.php?category=moisturizer" class="category-slide">
                                <i class="fas fa-pump-soap"></i>
                                <h3>Moisturizer</h3>
                            </a>

                            <a href="category.php?category=sunscreen" class="category-slide">
                                <i class="fas fa-sun"></i>
                                <h3>Sunscreen</h3>
                            </a>

                            <a href="category.php?category=cleanser" class="category-slide">
                                <i class="fas fa-soap"></i>
                                <h3>Cleanser</h3>
                            </a>

							<a href="category.php?category=mask" class="category-slide">
							<i class="fas fa-theater-masks"></i>
                                <h3>Masks</h3>
                            </a>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

   <h1 class="heading">Skinline Products</h1>

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

<form action="cart_action.php" method="post" class="box">
   <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
   <input type="hidden" name="name" value="<?= $fetch_product['product_name']; ?>">
   <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
   <input type="hidden" name="image" value="<?= $fetch_product['img_01']; ?>">
   <img src="<?= $img01Path; ?>" alt="<?= $fetch_product['product_name']; ?>"> <br>
   <a href="comment-sec.php?pid=<?= htmlspecialchars($fetch_product['id']); ?>" class="fas fa-eye" style="color: black; font-size: 32px; margin-bottom: 10px;"></a>
   <div class="name"><?= $fetch_product['product_name']; ?></div>
   <div class="flex">
      <div class="price"><span>₱</span><?= $fetch_product['price']; ?></div>
      <input type="number" name="quantity" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
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
<style>
    .category {
    text-align: center;
    margin-left: 40px;
}

.category .heading {
    font-size: 40px; /* Increased font size */
    margin-bottom: 50px;
    color: #333;
}

/* Wrapper for the category items */
.category-slider {
    display: flex;
    justify-content: center;
    margin: 0 auto;
}

.category-wrapper {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 40px; /* Increased gap between items */
    max-width: 1400px; /* Increased width */
}

/* Individual category item */
.category-slide {
    text-decoration: none;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 180px; /* Increased width */
    padding: 25px; /* Increased padding */
    border: solid black 1px;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Slightly larger shadow */
}

.category-slide i {
    font-size: 56px; /* Increased icon size */
    margin-bottom: 15px;
    color: #000000; /* Default icon color */
}

.category-slide h3 {
    font-size: 22px; /* Increased text size */
    margin-top: 15px;
    color: #000000; /* Default text color */
}

.category-slide:hover {
    transform: translateY(-8px); /* Slightly increased hover effect */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Increased shadow on hover */
    background-color: rgb(0, 0, 0); /* Background color change on hover */
}

.category-slide:hover i {
    color: #ffffff; /* Icon color changes to white on hover */
}

.category-slide:hover h3 {
    color: #ffffff; /* Text color also changes to white on hover */
}

/* Responsive design for smaller screens */
@media screen and (max-width: 768px) {
    .category-wrapper {
        justify-content: center;
        gap: 25px;
    }

    .category-slide {
        width: 140px;
        padding: 20px;
    }

    .category-slide i {
        font-size: 48px;
    }

    .category-slide h3 {
        font-size: 18px;
    }
}
</style>
</html>

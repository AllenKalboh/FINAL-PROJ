<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quick View</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="quickviews.css">
   <style>

   </style>
</head>
<body>
<a href="product.php" class="back-button">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="container">
    <?php
    include('db.php');

    // Check if the 'pid' parameter is present in the URL
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        
        // Prepare the query using MySQLi
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $stmt->bind_param("i", $pid); // "i" specifies the type of the parameter (integer)
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($fetch_product = $result->fetch_assoc()) {
                // Construct image paths using correct column names
                $img01Path = 'uploads/' . basename($fetch_product["img_01"]);
                $img02Path = 'uploads/' . basename($fetch_product["img_02"]);
                $img03Path = 'uploads/' . basename($fetch_product["img_03"]);
    ?>
                <section class="heading">
                    <div class="quick-view">
                        <div class="image-container">
                            <div class="main-image">
                                <img id="mainImage" src="<?= htmlspecialchars($img01Path); ?>" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                            </div>
                            <div class="sub-image">
                                <?php if (!empty($fetch_product['img_01'])): ?>
                                    <img class="thumbnail" src="<?= htmlspecialchars($img01Path); ?>" onclick="changeImage('<?= htmlspecialchars($img01Path); ?>')" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                                <?php endif; ?>
                                <?php if (!empty($fetch_product['img_02'])): ?>
                                    <img class="thumbnail" src="<?= htmlspecialchars($img02Path); ?>" onclick="changeImage('<?= htmlspecialchars($img02Path); ?>')" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                                <?php endif; ?>
                                <?php if (!empty($fetch_product['img_03'])): ?>
                                    <img class="thumbnail" src="<?= htmlspecialchars($img03Path); ?>" onclick="changeImage('<?= htmlspecialchars($img03Path); ?>')" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="content">
                            <div class="name"><?= htmlspecialchars($fetch_product['product_name']); ?></div>
                            <div class="price"><span>₱</span><?= htmlspecialchars($fetch_product['price']); ?></div>
                            <div class="details"><?= htmlspecialchars($fetch_product['description']); ?></div>
                            <div class="add-to-cart">
                                <form action="cart_action.php" method="POST">
                                    <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
                                    <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                                    <input type="hidden" name="price" value="<?= htmlspecialchars($fetch_product['price']); ?>">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                                    <button type="submit" name="add_to_cart">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
    <?php
            }
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo '<p class="empty">Product ID not specified!</p>';
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quick view</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
       body {
           font-family: Arial, sans-serif;
           background-color: #f4f4f4;
           margin: 0;
           padding: 0;
           display: flex;
           justify-content: center;
           align-items: center;
           min-height: 100vh;
       }

       .heading {
           text-align: center;
           margin: 20px 0;
           font-size: 2em;
           color: #333;
       }

       .quick-view {
           display: flex;
           align-items: flex-start;
           justify-content: space-between;
           background: #fff;
           border: 1px solid #000;
           border-radius: 20px;
           box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
           padding: 20px;
           max-width: 1200px;
           width: 100%;
           box-sizing: border-box;
       }

       .image-container {
           flex: 1;
           display: flex;
           flex-direction: column;
           align-items: center;
           margin-right: 20px;
           position: relative;
       }

       .main-image {
           width: 90%;
           max-width: 500px;
           margin-bottom: 15px;
           
       }

       .main-image img {
           width: 100%;
           height: auto;
           display: block;
           border: 1px solid #ddd;
           border-radius: 4px;
       }

       .sub-image {
           display: flex;
           gap: 10px;
       }

       .thumbnail {
           width: 80px;
           height: 80px;
           object-fit: cover;
           cursor: pointer;
           border: 2px solid transparent;
           transition: border 0.3s ease;
           border-radius: 4px;
       }

       .thumbnail:hover {
           border: 2px solid #333;
       }

       .content {
           flex: 1;
           max-width: 300px;
           text-align: right;
       }

       .name {
           font-size: 24px;
           font-weight: bold;
           color: #333;
           text-align: center;
       }

       .price {
           font-size: 20px;
           margin: 10px 0;
           color: #e67e22;
       }

       .details {
           margin-top: 10px;
           color: #555;
           text-align: center;
           font-size: 27px;
       }

       .empty {
           text-align: center;
           color: #999;
           font-size: 18px;
       }
   </style>
</head>
<body>
<a href="product.php" class="back-button">
        <i class="fas fa-arrow-left"></i>
</a>

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
                        <div class="price"><span>₱.</span><?= htmlspecialchars($fetch_product['price']); ?></div>
                        <div class="details"><?= htmlspecialchars($fetch_product['description']); ?></div>
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

<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>

</body>
</html>

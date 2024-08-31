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
    
   /* Include your existing CSS here */

   .main-image {
            width: 100%;
            max-width: 500px;
            margin-bottom: 15px;
            position: relative;
        }

        .main-image img {
            width: 100%;
            height: auto;
            display: block;
            border: 1px solid #ddd;
            border-radius: 4px;
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
        }

        .left {
            left: 10px;
        }

        .right {
            right: 10px;
        }

        .sub-image {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.3s ease;
            border-radius: 4px;
        }

        .thumbnail.selected {
            border: 2px solid #333;
        }
        .place-order button{
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #000000;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .place-order button:hover{
            background-color: gray;
        }
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
            <button class="nav-button left" onclick="prevImage()">&#10094;</button>
            <div class="main-image">
                <img id="mainImage" src="<?= htmlspecialchars($img01Path); ?>" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
            </div>
            <button class="nav-button right" onclick="nextImage()">&#10095;</button>
            <div class="sub-image">
                <?php if (!empty($fetch_product['img_01'])): ?>
                    <img class="thumbnail" id="thumb1" src="<?= htmlspecialchars($img01Path); ?>" onclick="changeImage('<?= htmlspecialchars($img01Path); ?>', 'thumb1')" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                <?php endif; ?>
                <?php if (!empty($fetch_product['img_02'])): ?>
                    <img class="thumbnail" id="thumb2" src="<?= htmlspecialchars($img02Path); ?>" onclick="changeImage('<?= htmlspecialchars($img02Path); ?>', 'thumb2')" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                <?php endif; ?>
                <?php if (!empty($fetch_product['img_03'])): ?>
                    <img class="thumbnail" id="thumb3" src="<?= htmlspecialchars($img03Path); ?>" onclick="changeImage('<?= htmlspecialchars($img03Path); ?>', 'thumb3')" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
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


    


    <div class="place-order">
        <form action="solo_checkout.php" method="POST">
            <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
            <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_product['product_name']); ?>">
            <input type="hidden" name="price" value="<?= htmlspecialchars($fetch_product['price']); ?>">
            <input type="hidden" name="quantity" value="1"> <!-- Single purchase quantity -->
            <button type="submit" name="place_order">Buy Now</button>
            
        </form>
    </div>
    
</div>
    </div>
</section>

    <script>
        let currentIndex = 0;
        const images = [
            '<?= htmlspecialchars($img01Path); ?>',
            '<?= htmlspecialchars($img02Path); ?>',
            '<?= htmlspecialchars($img03Path); ?>'
        ];

        function showImage(index) {
            const mainImage = document.getElementById('mainImage');
            mainImage.style.opacity = 0;
            setTimeout(() => {
                mainImage.src = images[index];
                mainImage.style.opacity = 1;
                updateThumbnails(index);
            }, 500);
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }

        function changeImage(src, thumbId) {
            const mainImage = document.getElementById('mainImage');
            mainImage.style.opacity = 0;
            setTimeout(() => {
                mainImage.src = src;
                mainImage.style.opacity = 1;
                updateThumbnailsById(thumbId);
            }, 500);
        }

        function updateThumbnails(index) {
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach((thumb, i) => {
                thumb.classList.toggle('selected', i === index);
            });
        }

        function updateThumbnailsById(selectedId) {
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => {
                thumb.classList.toggle('selected', thumb.id === selectedId);
            });
        }
    </script>

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

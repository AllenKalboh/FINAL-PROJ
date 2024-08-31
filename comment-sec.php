<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="order_detailss.css"> <!-- Link to external CSS file if used -->

    <?php include('header.php'); ?>
	<!-- breadcrumb -->
    <div class="bc">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
                Product
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Product View
            </span>
        </div>
    </div>
    <?php include('head.php'); ?>
<style>
    
    /* Include your existing CSS here */
 .bc{
    margin-left: 10%;
 }
 .heading {
    border: solid black 1px;
    display: flex;
    justify-content: center; /* Center align the whole section */
    padding: 20px;
    background-color: #fff; /* Optional: Background color for better visibility */
    border-radius: 8px; /* Optional: Rounded corners */
    box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Optional: Shadow for depth */
}

/* Container for Content and Images */
.content-container {
    display: flex;
    justify-content: space-between; /* Space between image and content */
    width: 100%;
    max-width: 1200px; /* Adjust as needed */
    margin: 0 auto; /* Center align horizontally */
}

/* Image Container Styling */
.image-container {
    position: relative;
    width: 50%; /* Adjust width as needed */
}

/* Navigation Buttons */
.nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
    border-radius: 4px;
    font-size: 20px;
}

.left {
    left: 10px;
}

.right {
    right: 10px;
}

/* Image Wrapper and Main Image */
.image-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.main-image {
    width: 100%;
    max-width: 500px; /* Adjust based on design */
    margin-bottom: 15px;
}

.main-image img {
    width: 100%;
    height: auto;
    display: block;
    border: 1px solid #ddd;
    border-radius: 4px;
    opacity: 1;
    transition: opacity 0.5s ease;
    border: solid black 1px;
}

/* Thumbnails Styling */
.sub-image {
    display: flex;
    gap: 10px;
    margin-top: 20px;
    justify-content: center; /* Center align thumbnails */
}

.thumbnail {
    width: 60px;
    height: 60px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border 0.3s ease;
    border-radius: 4px;
    border: solid black 1px;
}

.thumbnail.selected {
    border: 2px solid #333;
}

/* Details Container Styling */
.details-container {
    width: 50%; /* Adjust width as needed */
    padding: 0 20px;
    color: black;
}

/* Heading Title Styling */
.heading-title {
    display: flex;
    justify-content: space-between; /* Space between title and product name */
    margin-bottom: 20px;
}

.heading-title h1 {
    margin: 0;
}

.product-name {
    font-size: 18px;
    color: #333;
    align-self: flex-start; /* Align product name to the top */
}

/* Content Styling */
.content {
    text-align: left; /* Align text to the left */
}

.name {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.price {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
}

.details {
    font-size: 16px;
    color: black;
    margin-bottom: 20px;
}

/* Add to Cart and Place Order Styling */
.add-to-cart, .place-order {
    margin-top: 5px;
}

.add-to-cart form, .place-order form {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align form elements to the left */
}

.add-to-cart button, .place-order button {
    margin-top: 10px;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #000;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.add-to-cart button:hover, .place-order button:hover {
    background-color: gray;
}
.comments-section {
    margin-top: 30px;
    border: solid black 1px;
    padding:20px;
    border-radius: 20px;
    color: black;
    margin-bottom: 20px;
}

.comments-list {
    margin-bottom: 20px;
}

.comment {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
}

.comment-header {
    display: flex;
    gap: 10px;
    
}

.profile-pic {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    border: 1px solid #ddd;
}

.comment-body {
    max-width: 600px;
    
}

.comment p {
    margin: 0;
    color: black;
}

.comment small {
    display: block;
    color: #888;
    margin-top: 5px;
}

.comment-form {
    margin-top: 20px;
}

.comment-form form {
    display: flex;
    flex-direction: column;
}

.comment-form label {
    margin-bottom: 5px;
}

.comment-form textarea {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ddd;
    resize: vertical;
    border: 1px solid black;
}

.comment-form button {
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #000;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
}

.comment-form button:hover {
    background-color: gray;
}
.qty-inp{
    width: 50px;

}
#quantity{
    border: solid black 2px;
    font-size: 32px;
}
#rating {
    border: solid black 2px;
    font-size: 32px;
}
    </style>
    
    <body>
    <div class="container">
    <?php
    include('db.php');

    // Check if the 'pid' parameter is present in the URL
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        
        // Prepare the query using MySQLi
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $stmt->bind_param("i", $pid);
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
        <div class="content-container">
            <!-- Image Container -->
            <div class="image-container">
                <button class="nav-button left" onclick="prevImage()">&#10094;</button>
                <div class="image-wrapper">
                    <div class="main-image">
                        <img id="mainImage" src="<?= htmlspecialchars($img01Path); ?>" alt="<?= htmlspecialchars($fetch_product['product_name']); ?>">
                    </div>
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
                <button class="nav-button right" onclick="nextImage()">&#10095;</button>
            </div>
            
            <!-- Content Container -->
            <div class="details-container">
                <div class="heading-title">
                    <h1>Product View</h1>
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
                            <input type="number" id="quantity" name="quantity" min="1" value="1" class="qty-inp">
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
                        <div class="rating">
        <form action="rate_product.php" method="POST">
            <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">
            <label for="rating">Rate this product:</label>
            <select name="rating" id="rating">
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button type="submit">Submit Rating</button>
        </form>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comments Section -->
    <section class="comments-section">
    <h2>Comments</h2>
    <div class="comments-list">
        <?php
        // Fetch comments, user names, and profile pictures
        $comment_stmt = $conn->prepare("
            SELECT comments.comment, comments.created_at, users.username, users.profile_picture 
            FROM comments
            JOIN users ON comments.user_id = users.user_id
            WHERE comments.pid = ? 
            ORDER BY comments.created_at DESC
        ");
        $comment_stmt->bind_param("i", $pid);
        $comment_stmt->execute();
        $comment_result = $comment_stmt->get_result();
        
        if ($comment_result->num_rows > 0) {
            while ($comment = $comment_result->fetch_assoc()) {
                $profilePic = !empty($comment['profile_picture']) ? htmlspecialchars($comment['profile_picture']) : 'images/default-profile.png';
                echo '<div class="comment">';
                echo '<div class="comment-header">';
                echo '<img src="' . $profilePic . '" alt="Profile Picture" class="profile-pic">';
                echo '<div class="comment-body">';
                echo '<p><strong>' . htmlspecialchars($comment['username']) . ':</strong></p>';
                echo '<p>' . htmlspecialchars($comment['comment']) . '</p>';
                echo '<small>Posted on ' . htmlspecialchars($comment['created_at']) . '</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments yet.</p>';
        }

        $comment_stmt->close();
        ?>
    </div>
    <div class="comment-form">
        <h3>Leave a Comment:</h3>
        <form action="submit_comment.php" method="POST">
            <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
            <!-- User info is pulled from the session, so no need to input name -->
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>
            <button type="submit">Submit Comment</button>
        </form>
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
<?php include ('footer.php');
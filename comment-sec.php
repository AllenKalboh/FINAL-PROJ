<?php
    include('db.php');
    session_start(); // Ensure the session is started

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
<link rel="stylesheet" href="comment-sec.css">
<body>

    <div class="container">
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
        SELECT comments.id, comments.comment, comments.created_at, users.username, users.profile_picture, comments.user_id
        FROM comments
        JOIN users ON comments.user_id = users.user_id
        WHERE comments.pid = ? 
        ORDER BY comments.created_at DESC
    ");
    $comment_stmt->bind_param("i", $pid);
    $comment_stmt->execute();
    $comment_result = $comment_stmt->get_result();
    
    $currentUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

    if ($comment_result->num_rows > 0) {
        while ($comment = $comment_result->fetch_assoc()) {
            $profilePic = !empty($comment['profile_picture']) ? htmlspecialchars($comment['profile_picture']) : 'images/default-profile.png';
            $isOwner = $currentUserId == $comment['user_id'];
            echo '<div class="comment">';
            echo '<div class="comment-header">';
            echo '<img src="' . $profilePic . '" alt="Profile Picture" class="profile-pic">';
            echo '<div class="comment-body">';
            echo '<p><strong>' . htmlspecialchars($comment['username']) . ':</strong></p>';
            echo '<p>' . htmlspecialchars($comment['comment']) . '</p>';
            echo '<small class="comment-time">Posted on ' . htmlspecialchars($comment['created_at']) . '</small>';
            if ($isOwner) {
                echo '<button type="button" class="delete-button" data-comment-id="' . htmlspecialchars($comment['id']) . '">&#128465;</button>';
            }
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const commentSection = document.querySelector('.comments-list');

    commentSection.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('delete-button')) {
            const commentId = event.target.dataset.commentId;

            fetch('delete_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    comment_id: commentId
                    // Optionally, you can pass additional parameters if needed
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    // Remove the comment from the DOM
                    event.target.closest('.comment').remove();
                    alert(data.message); // Notify user of success
                } else {
                    alert(data.message); // Display error message
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the comment.');
            });
        }
    });
});
</script>


<?php include ('footer.php');
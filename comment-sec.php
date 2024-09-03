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
<style>
.comment-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.profile-pic {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-bottom: 50px;
}

.comment-body {
    flex: 1;
}

.rating {
    margin-bottom: 5px; /* Space between stars and comment text */
}

.rating {
    margin-top: 5px; /* Space between product name and rating */
    text-align: left; /* Align stars to the left */
}

.star {
    font-size: 20px; /* Adjust size as needed */
    color: #d3d3d3; /* Gray color for empty stars */
    margin: 0 1px; /* Spacing between stars */
}

.star.filled {
    color: #ffcc00; /* Yellow color for filled stars */
}
.rating {
    display: flex;
    align-items: center;
}

.stars {
    margin-right: 10px; /* Space between stars and rating text */
}

.rating-text {
    font-size: 1rem; /* Adjust font size as needed */
    color: #333; /* Adjust color as needed */
}


</style>
<body>

    <div class="container">
    <div class="container">
    <?php
    // Fetch product details and rating
    $product_stmt = $conn->prepare("
        SELECT id, product_name, price, description, img_01, img_02, img_03, rating
        FROM products
        WHERE id = ?
    ");
    $product_stmt->bind_param("i", $pid);
    $product_stmt->execute();
    $product_result = $product_stmt->get_result();
    $fetch_product = $product_result->fetch_assoc();
    $product_stmt->close();

    // Generate star rating HTML for product rating
    $rating = isset($fetch_product['rating']) ? (int) $fetch_product['rating'] : 0; // Convert rating to integer
    $stars = '';
    if ($rating > 0) {
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $stars .= '<span class="star filled">&#9733;</span>'; // Filled star
            } else {
                $stars .= '<span class="star">&#9733;</span>'; // Empty star
            }
        }
    }
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
                    <div class="rating">
                        <?php if ($rating > 0): ?>
                            <div class="stars">
                                <?= $stars; ?>
                            </div>
                            <div class="rating-text">
                                <?= htmlspecialchars($fetch_product['rating']); ?> / 5
                            </div>
                        <?php else: ?>
                            <p>No ratings yet.</p>
                        <?php endif; ?>
                    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- Comments Section -->
    <section class="comments-section">
    <h2 class="mb-3">Comments</h2>
    <div class="comments-list">
    <?php
    // Fetch comments, user names, profile pictures, and ratings
    $comment_stmt = $conn->prepare("
        SELECT comments.id, comments.comment, comments.created_at, users.username, users.profile_picture, comments.user_id, user_ratings.rating
        FROM comments
        JOIN users ON comments.user_id = users.user_id
        LEFT JOIN user_ratings ON comments.user_id = user_ratings.user_id
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
            $rating = isset($comment['rating']) ? (int) $comment['rating'] : 0; // Convert rating to integer
            $isOwner = $currentUserId == $comment['user_id'];

            // Generate star rating HTML only if rating is available
            $stars = '';
            if ($rating > 0) {
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        $stars .= '<span class="star filled">&#9733;</span>'; // Filled star
                    } else {
                        $stars .= '<span class="star">&#9733;</span>'; // Empty star
                    }
                }
            }

            echo '<div class="comment">';
            echo '<div class="comment-header">';
            echo '<img src="' . $profilePic . '" alt="Profile Picture" class="profile-pic">';
            echo '<div class="comment-body">';
            echo '<p><strong>' . htmlspecialchars($comment['username']) . '</strong></p>';
            if ($rating > 0) { // Display stars and rating text if rating exists
                echo '<div class="rating">';
                echo $stars;
                echo '<div class="rating-text">  ' . htmlspecialchars($comment['rating']) . ' / 5</div>';
                echo '</div>';
            }
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
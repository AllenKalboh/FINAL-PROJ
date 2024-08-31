<?php
session_start(); // Start the session to access user data
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo 'You must be logged in to submit a comment.';
    exit;
}

// Check if the required POST variables are set
if (isset($_POST['pid'], $_POST['comment'])) {
    $pid = $_POST['pid'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID

    // Validate input
    if (empty($comment)) {
        echo 'Comment cannot be empty.';
        exit;
    }

    // Prepare and execute the insert statement
    $stmt = $conn->prepare("INSERT INTO comments (pid, user_id, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $pid, $user_id, $comment);

    if ($stmt->execute()) {
        // Redirect to the product page with a success message
        header("Location: comment-sec.php?pid=" . $pid);
    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>

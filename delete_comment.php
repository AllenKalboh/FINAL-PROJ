<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

// Check if comment ID is set
if (isset($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT user_id FROM comments WHERE id = ?");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $comment = $result->fetch_assoc();
        if ($comment['user_id'] == $user_id) {
            $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
            $stmt->bind_param("i", $comment_id);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Comment deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error deleting comment']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized to delete this comment']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Comment Deleted Successfully']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Comment ID not provided']);
}

$conn->close();
?>

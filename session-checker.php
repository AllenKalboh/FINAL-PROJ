<?php
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>
            alert('You must be logged in to access this page.');
            window.location.href = 'login.php';
            </script>";
    exit();
}
?>
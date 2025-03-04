<?php
require 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;

    if (!$id || !$title || !$content) {
        echo "Missing data!";
        exit;
    }

    // Secure inputs
    $id = mysqli_real_escape_string($conn, $id);
    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);

    // Update the announcement in the database
    $query = "UPDATE announcements SET title='$title', content='$content' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "success"; // Ensure exact lowercase "success"
    } else {
        echo "Error updating: " . mysqli_error($conn);
    }
}
?>

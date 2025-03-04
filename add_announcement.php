<?php
include 'db.php'; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Validation: Check if fields are empty
    if (empty($title) || empty($content)) {
        echo "error: Please fill in all fields.";
        exit();
    }

    // Prepare SQL statement
    $sql = "INSERT INTO announcements (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $title, $content);
        if ($stmt->execute()) {
            echo "success"; // This response is checked in JavaScript
            exit();
        } else {
            echo "error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "error: " . $conn->error;
    }
}

$conn->close();
?>

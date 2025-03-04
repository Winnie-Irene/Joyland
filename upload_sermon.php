<?php
include 'db.php';
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $preacher = mysqli_real_escape_string($conn, $_POST['preacher']);
    $date = $_POST['date'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    $file_path = null;

    if (!empty($_FILES['sermon_file']['name'])) {
        $target_dir = "uploads";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = time() . "_" . basename($_FILES["sermon_file"]["name"]);
        $file_path = $target_dir . "/" . $file_name; 
        $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        
        // Allowed file types
        $allowed_types = ['mp4', 'mp3', 'wav', 'jpg', 'jpeg', 'png', 'gif', 'pdf'];

        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES["sermon_file"]["tmp_name"], $file_path)) {
                $file_path = mysqli_real_escape_string($conn, $file_path);
            } else {
                $_SESSION['alert'] = ["danger", "File upload failed. Please try again."];
                header("Location: dashboard.php");
                exit();
            }
        } else {
            $_SESSION['alert'] = ["warning", "Invalid file type! Allowed formats: mp4, mp3, wav, jpg, jpeg, png, gif, pdf."];
            header("Location: dashboard.php");
            exit();
        }
    }

    $sql = "INSERT INTO sermons (title, preacher, date, description, file_path) 
            VALUES ('$title', '$preacher', '$date', '$description', '$file_path')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['alert'] = ["success", "Sermon uploaded successfully!"];
    } else {
        $_SESSION['alert'] = ["danger", "Error uploading sermon. Please check your database connection."];
    }

    header("Location: dashboard.php");
    exit();
}
?>

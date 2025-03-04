<?php
include 'db.php';

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); 

    $query = "DELETE FROM announcements WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Announcement not found or already deleted."]);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(["status" => "error", "message" => "Database query failed."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}

mysqli_close($conn);
?>

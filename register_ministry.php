<?php
header('Content-Type: application/json');

// Database connection
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "joyland"; 

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed!"]);
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $ministry = trim($_POST["ministry"]);

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($ministry)) {
        echo json_encode(["status" => "error", "message" => "All fields are required!"]);
        exit();
    }

    // Prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO ministries (name, email, phone, ministry) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $ministry);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Registration successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: Could not register. Try again."]);
    }

    $stmt->close();
}

$conn->close();
?>

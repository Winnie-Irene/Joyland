<?php 
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "joyland";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : "";
    $prayer = $conn->real_escape_string($_POST['prayer']);

    $sql = "INSERT INTO prayer_requests (name, email, prayer) VALUES ('$name', '$email', '$prayer')";
    
    if ($conn->query($sql) === TRUE) {
        echo "success"; 
    } else {
        echo "error";
    }
}

$conn->close();
?>

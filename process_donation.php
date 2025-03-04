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
    $amount = $conn->real_escape_string($_POST['amount']);

    $sql = "INSERT INTO donations (name, email, amount) VALUES ('$name', '$email', '$amount')";
    
    if ($conn->query($sql) === TRUE) {
        echo "success"; // AJAX expects this response
    } else {
        echo "error";
    }
}

$conn->close();
?>

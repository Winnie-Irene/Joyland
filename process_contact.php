<?php
// Database connection
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "joyland"; 

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Insert into database using a prepared statement
    $stmt = $conn->prepare("INSERT INTO contactus (FirstName, LastName, Email, PhoneNumber, Message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $message);

    if ($stmt->execute()) {  // ✅ Corrected this part
        echo "success"; // AJAX expects this response
    } else {
        echo "error";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
exit; // Stop further execution
?>

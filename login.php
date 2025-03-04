<!-- login.php -->
<?php
session_start();

// Database connection
$host = 'localhost';
$db = 'joyland';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $sql = "SELECT * FROM admins WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Login successful, store user session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('Location: dashboard.php'); // Redirect to dashboard
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }

    $conn->close();
}
?>

<?php
require 'mpesa.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $amount = htmlspecialchars($_POST['amount']);
    $email = htmlspecialchars($_POST['email']);

    // Ensure phone number is in the correct format (convert 07xxxxxxxx to 2547xxxxxxxx)
    if (preg_match('/^07\d{8}$/', $phone)) {
        $phone = '254' . substr($phone, 1);
    } elseif (!preg_match('/^2547\d{8}$/', $phone)) {
        echo "error"; // Send error response for invalid phone
        exit();
    }

    $response = stkPush($phone, $amount, $email);

    if (isset($response['ResponseCode']) && $response['ResponseCode'] == "0") {
        echo "success"; // Return success
    } else {
        echo "error"; // Return error
    }
    exit();
}
?>

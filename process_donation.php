<?php
header("Content-Type: application/json");
date_default_timezone_set('Africa/Nairobi');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joyland";

// Safaricom API credentials
$consumerKey = "RVc6ucfOSrxOy4tc2yCJTzH3NQy3VOZFvKXdWN6lzm6tdPW2";
$consumerSecret = "N6wpq5UZT7wsH9EtvZwQCgGGQM15Nh3JxMscCmKvfCGz3FOZ2ZweBgRnmPHywbDL";
$businessShortCode = "174379"; 
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919"; 
$callbackURL = "https://91e0-102-0-3-218.ngrok-free.app/process_donation.php?action=callback"; // The callback URL

// Check action (Donation or Callback)
$action = $_GET['action'] ?? '';

// Generate M-Pesa Access Token
function getAccessToken($consumerKey, $consumerSecret)
{
    $credentials = base64_encode($consumerKey . ":" . $consumerSecret);
    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic $credentials"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response->access_token ?? null;
}

// Handle STK Push Request
if ($action === 'donate') {
    
    $phoneNumber = $_POST['phone'] ?? '';
    $amount = $_POST['amount'] ?? '';

    if (!$phoneNumber || !$amount) {
        echo json_encode(["status" => "error", "message" => "Phone number and amount are required"]);
        exit;
    }

    $accessToken = getAccessToken($consumerKey, $consumerSecret);
    if (!$accessToken) {
        echo json_encode(["status" => "error", "message" => "Failed to get access token"]);
        exit;
    }

    $timestamp = date('YmdHis');
    $password = base64_encode($businessShortCode . $passkey . $timestamp);

    // STK Push API URL
    $url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

    // STK Push Payload
    $payload = [
        "BusinessShortCode" => $businessShortCode,
        "Password" => $password,
        "Timestamp" => $timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => $phoneNumber,
        "PartyB" => $businessShortCode,
        "PhoneNumber" => $phoneNumber,
        "CallBackURL" => $callbackURL,
        "AccountReference" => "Church Donation",
        "TransactionDesc" => "Donation"
    ];

    // Send cURL request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    // Return response
    echo json_encode($response);
    exit;
}

// Handle M-Pesa Callback
if ($action === 'callback') {
   
    $data = file_get_contents("php://input");

    file_put_contents("mpesa_response.log", $data . PHP_EOL, FILE_APPEND);

    $response = json_decode($data, true);

    // Check if transaction was successful
    if (isset($response['Body']['stkCallback']['ResultCode']) && $response['Body']['stkCallback']['ResultCode'] == 0) {
        $metadata = $response['Body']['stkCallback']['CallbackMetadata']['Item'] ?? [];

        $amount = $metadata[0]['Value'] ?? "Unknown";
        $mpesaReceiptNumber = $metadata[1]['Value'] ?? "Unknown";
        $phoneNumber = $metadata[4]['Value'] ?? "Unknown";

        try {
            // Database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Insert transaction
            $stmt = $conn->prepare("INSERT INTO donations (phone, amount, receipt_number) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $phoneNumber, $amount, $mpesaReceiptNumber);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            // Return success response
            echo json_encode(["status" => "success", "message" => "Payment saved successfully"]);
        } catch (Exception $e) {
            file_put_contents("mpesa_response.log", "DB Error: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo json_encode(["status" => "error", "message" => "Database error occurred"]);
        }
    } else {
        file_put_contents("mpesa_response.log", "Failed Payment: " . $data . PHP_EOL, FILE_APPEND);
        echo json_encode(["status" => "failed", "message" => "Transaction not successful"]);
    }
    exit;
}

// Default response
echo json_encode(["status" => "error", "message" => "Invalid action"]);
?>

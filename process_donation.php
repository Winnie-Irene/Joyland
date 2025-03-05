<!-- <?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
date_default_timezone_set('Africa/Nairobi');

// Database connection details
require "db.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joyland";

// Safaricom API credentials
$consumerKey = "RVc6ucfOSrxOy4tc2yCJTzH3NQy3VOZFvKXdWN6lzm6tdPW2";
$consumerSecret = "N6wpq5UZT7wsH9EtvZwQCgGGQM15Nh3JxMscCmKvfCGz3FOZ2ZweBgRnmPHywbDL";
$businessShortCode = "174379"; 
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919"; 
$callbackURL = "https://8092-102-0-3-218.ngrok-free.app/process_donation.php?action=callback"; // The callback URL

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
    $response = curl_exec($ch);
    if (!$response) {
        echo json_encode(["status" => "error", "message" => "Failed to fetch access token"]);
    exit;
    }
    $response = json_decode($response, true);
    curl_close($ch);

    return $response['access_token'] ?? null;

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
        "Content-Type: application/json",
        "ngrok-skip-browser-warning: true" // ✅ This bypasses the warning
    ]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    // Check if M-Pesa returned an error
    file_put_contents("mpesa_error.log", json_encode($response) . PHP_EOL, FILE_APPEND);

// Check if M-Pesa returned an error
if (isset($response['errorCode'])) {
    echo json_encode(["status" => "error", "message" => "M-Pesa API Error: " . $response['errorMessage']]);
    exit;
}

// Return response
echo json_encode($response);
exit;

}

// Handle M-Pesa Callback
if ($action === 'callback') {
   
    $data = file_get_contents("php://input");

    file_put_contents("mpesa_response.log", json_encode($response, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);

    $response = json_decode($data, true);

    // Check if transaction was successful
        if (isset($response['Body']['stkCallback']['ResultCode']) && $response['Body']['stkCallback']['ResultCode'] == 0) {
            $metadata = [];
        foreach ($response['Body']['stkCallback']['CallbackMetadata']['Item'] as $item) {
            $metadata[$item['Name']] = $item['Value'];
        }

        $amount = $metadata['Amount'] ?? "Unknown";
        $mpesaReceiptNumber = $metadata['MpesaReceiptNumber'] ?? "Unknown";
        $phoneNumber = $metadata['PhoneNumber'] ?? "Unknown";

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
echo json_encode(["status" => "error", "message" => "Invalid action"]);*/
?> -->

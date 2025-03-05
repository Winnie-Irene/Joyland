<?php
require 'db.php'; // Ensure this file contains valid database connection details

$data = file_get_contents('php://input');
$logFile = "mpesa_response.log";
file_put_contents($logFile, $data . PHP_EOL, FILE_APPEND);

$response = json_decode($data, true);

if ($response && isset($response['Body']['stkCallback'])) {
    $callback = $response['Body']['stkCallback'];
    $resultCode = $callback['ResultCode'];

    if ($resultCode == 0) {
        $mpesaReceiptNumber = $callback['CallbackMetadata']['Item'][1]['Value'] ?? 'N/A';
        $phoneNumber = $callback['CallbackMetadata']['Item'][4]['Value'] ?? 'N/A';
        $amount = $callback['CallbackMetadata']['Item'][0]['Value'] ?? 0;
        $transactionDate = date('Y-m-d H:i:s');

        // Store transaction in the database
        $stmt = $conn->prepare("INSERT INTO donations (amount, trancation_code, phone, title, date_created) VALUES (?, ?, ?, ?, ?)");
        $title = "Donation";
        $stmt->bind_param("dssss", $amount, $mpesaReceiptNumber, $phoneNumber, $title, $transactionDate);
        $stmt->execute();
        $stmt->close();

        echo "Payment successful!";
    } else {
        echo "Payment failed. Reason: " . $callback['ResultDesc'];
    }
}
?>

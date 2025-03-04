<?php
// Get JSON response
$data = file_get_contents("php://input");
$decoded_data = json_decode($data, true);

// Extract details
$merchantRequestID = $decoded_data['Body']['stkCallback']['MerchantRequestID'];
$checkoutRequestID = $decoded_data['Body']['stkCallback']['CheckoutRequestID'];
$resultCode = $decoded_data['Body']['stkCallback']['ResultCode'];

if ($resultCode == 0) {
    // Payment was successful
    $amount = $decoded_data['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
    $mpesaReceiptNumber = $decoded_data['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];

    // Save to database (Assuming you have a `donations` table)
    $conn = new mysqli("localhost", "root", "", "joyland");
    $stmt = $conn->prepare("INSERT INTO donations (amount, mpesa_receipt, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $amount, $mpesaReceiptNumber, $phone);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Send a success response to Mpesa
    echo json_encode(["ResultCode" => 0, "ResultDesc" => "Success"]);
} else {
    // Payment failed
    echo json_encode(["ResultCode" => 1, "ResultDesc" => "Failed"]);
}
?>

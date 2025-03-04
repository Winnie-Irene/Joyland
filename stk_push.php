<?php
$access_token = "JKArvDL1fWybudj7RtCiMQpaATt8"; // Get from generate_token.php
$phone = "254794720311"; // Replace with actual phone number
$amount = "100"; // Donation amount
$businessShortCode = "174379"; // Test paybill number (for sandbox)
$passKey = "YOUR_MPESA_PASSKEY"; // Get from Daraja API portal

// Generate timestamp
$timestamp = date("YmdHis");
$password = base64_encode($businessShortCode.$passKey.$timestamp);

// Prepare STK Push payload
$stkPushData = array(
    "BusinessShortCode" => $businessShortCode,
    "Password" => $password,
    "Timestamp" => $timestamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => $amount,
    "PartyA" => $phone,
    "PartyB" => $businessShortCode,
    "PhoneNumber" => $phone,
    "CallBackURL" => "https://yourwebsite.com/mpesa_callback.php",
    "AccountReference" => "Joyland Donations",
    "TransactionDesc" => "Donation to Joyland Church"
);

// Convert to JSON
$data_string = json_encode($stkPushData);

// Send STK Push request
$url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $access_token",
    "Content-Type: application/json"
));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

// Show response
echo $response;
?>

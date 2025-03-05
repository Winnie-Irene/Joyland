<?php
function getAccessToken() {
    $consumerKey = 'RVc6ucfOSrxOy4tc2yCJTzH3NQy3VOZFvKXdWN6lzm6tdPW2'; 
    $consumerSecret = 'N6wpq5UZT7wsH9EtvZwQCgGGQM15Nh3JxMscCmKvfCGz3FOZ2ZweBgRnmPHywbDL'; 
    $credentials = base64_encode($consumerKey . ":" . $consumerSecret);

    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    $headers = ["Authorization: Basic $credentials"];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        die('Curl Error: ' . curl_error($curl));
    }
    curl_close($curl);

    $result = json_decode($response, true);
    if (isset($result['access_token'])) {
        return $result['access_token'];
    } else {
        die('Error: Failed to get access token. Response: ' . $response);
    }
}

function stkPush($phone, $amount, $description) {
    $accessToken = getAccessToken();
    if (!$accessToken) {
        return ['errorMessage' => 'Failed to generate access token'];
    }

    $url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
    $businessShortCode = '174379';
    $lipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $timestamp = date("YmdHis");
    $password = base64_encode($businessShortCode . $lipaNaMpesaPasskey . $timestamp);

    // Ensure phone is in 2547XXXXXXXX format
    if (preg_match('/^07\d{8}$/', $phone)) {
        $phone = '254' . substr($phone, 1);
    }

    $callbackURL = "https://yourdomain.com/callback.php"; // Use a valid callback URL

    $postData = [
        'BusinessShortCode' => $businessShortCode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerBuyGoodsOnline',
        'Amount' => $amount,
        'PartyA' => $phone,
        'PartyB' => $businessShortCode,
        'PhoneNumber' => $phone,
        'CallBackURL' => $callbackURL,
        'AccountReference' => 'MH Chapel Donation',
        'TransactionDesc' => $description
    ];

    $headers = [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    ];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        die('Curl Error: ' . curl_error($curl));
    }
    curl_close($curl);

    $result = json_decode($response, true);
    if (isset($result['ResponseCode']) && $result['ResponseCode'] == "0") {
        return $result;
    } else {
        die('Error: STK Push Failed. Response: ' . json_encode($result));
    }
}
?>

<?php
$consumerKey = 'RVc6ucfOSrxOy4tc2yCJTzH3NQy3VOZFvKXdWN6lzm6tdPW2'; // Replace with your actual Consumer Key
$consumerSecret = 'N6wpq5UZT7wsH9EtvZwQCgGGQM15Nh3JxMscCmKvfCGz3FOZ2ZweBgRnmPHywbDL'; // Replace with your actual Consumer Secret

// Encode Consumer Key and Secret
$credentials = base64_encode($consumerKey . ":" . $consumerSecret);

// Safaricom OAuth URL
$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

// cURL request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic $credentials"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

// Debugging: Print the response
echo "HTTP Code: " . $httpCode . "<br>";
echo "Raw Response: " . $response . "<br>";
echo "cURL Error: " . $error . "<br>";

// Decode JSON response
$responseData = json_decode($response);

// Check if 'access_token' exists
if (isset($responseData->access_token)) {
    echo "Access Token: " . $responseData->access_token;
} else {
    echo "Failed to get access token. Check your Consumer Key, Consumer Secret, and Internet connection.";
}
?>

<?php
$consumerKey = "adxJPGdItDylOGi008gQWDI839IujRu6nywfCGy20DrlZhF0"; 
$consumerSecret = "tiADOGTe6oVCo0MEP89uYGARReXKi86aIuvpitWSXzBZpgeF83yHZUyH27O8nmE0"; 

// Generate base64 encoded credentials
$credentials = base64_encode("$consumerKey:$consumerSecret");

// Set up the cURL request
$url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic $credentials"));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

// Convert JSON response to array
$data = json_decode($response, true);

// Output token
echo "Access Token: " . $data['access_token'];
?>

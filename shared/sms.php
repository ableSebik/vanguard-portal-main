<?php

// Replace with your own phone number and message
$to = "+15555555555";
$message = "Hello, this is a test message from a PHP script.";

// Set your username and password
$username = "your_username";
$password = "your_password";

// Set the sender of the SMS
$from = "PHP Script";

// Set the API endpoint
$url = "http://api.your-sms-provider.com/send_sms";

// Set the parameters for the request
$data = array(
    "to" => $to,
    "message" => $message,
    "username" => $username,
    "password" => $password,
    "from" => $from
);

// Create the HTTP client
$client = new HttpClient();

// Set the HTTP method and URL
$client->setMethod("POST");
$client->setUrl($url);

// Set the request parameters
$client->setData($data);

// Send the request
$response = $client->send();

// Check the response status code
if ($response->getStatus() == 200) {
    echo "SMS sent successfully.";
} else {
    echo "Error sending SMS: " . $response->getStatus() . " " . $response->getReasonPhrase();
}


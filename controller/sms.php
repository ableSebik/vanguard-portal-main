<?php
error_reporting(0);

$hello = 'hello everyone';
echo $hello;

$key= "QzU274iI9CB3q5cG5bTebXTsm";
$to = "0555391302";
$msg = "This is a message from mnotify";
$sender_id = "Mani";

$msg = urlencode($msg);

$url = "https://api.mnotify.com/api/template?key=$key&to=$to&msg=$msg&sender_id=$sender_id";

$response =file_get_contents($url);
echo $response;


?>
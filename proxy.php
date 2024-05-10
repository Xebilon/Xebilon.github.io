<?php
// Get the URL of the HLS stream
$url = $_GET['url'];

// Set the correct headers to allow CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/x-mpegURL');

// Output the HLS stream content
echo file_get_contents($url);
?>

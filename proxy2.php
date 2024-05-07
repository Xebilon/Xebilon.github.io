<?php
// Get the HLS stream URL from the query parameters
$hlsUrl = $_GET['url'];

// Set CORS headers to allow cross-origin requests
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/vnd.apple.mpegurl');

// Fetch the HLS stream and echo it
echo file_get_contents($hlsUrl);
?>

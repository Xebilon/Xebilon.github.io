<?php
// Validate URL
if (filter_var($_GET['url'], FILTER_VALIDATE_URL) === FALSE) {
    http_response_code(400);
    die('Not a valid URL');
}

// Fetch video data via proxy
$url = $_GET['url'];
$response = file_get_contents($url);

// Determine content type based on file extension
$contentType = 'video/mp4'; // Default content type
$extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
if ($extension === 'ts') {
    $contentType = 'video/mp2t';
} else if ($extension === 'avi') {
    $contentType = 'video/x-msvideo';
} else if ($extension === 'mkv') {
    $contentType = 'video/x-matroska';
}

// Set proper headers
header("Content-Type: $contentType");
header("Access-Control-Allow-Origin: *"); // Allow all origins (for testing purposes)

// Output the video content
readfile($url);
?>

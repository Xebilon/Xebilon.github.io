<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Validate the URL
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        // Set headers to match the content type of the original URL
        $headers = get_headers($url, 1);
        if (isset($headers['Content-Type'])) {
            header("Content-Type: " . $headers['Content-Type']);
        }

        // Read and output the content of the URL
        readfile($url);
    } else {
        echo "Invalid URL.";
    }
} else {
    echo "No URL specified.";
}
?>

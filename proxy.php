<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Validate the URL
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        // Fetch headers to determine the content type
        $headers = get_headers($url, 1);
        if (isset($headers['Content-Type'])) {
            header("Content-Type: " . $headers['Content-Type']);
        }

        // Read and output the content of the URL
        echo file_get_contents($url);
    } else {
        echo "Invalid URL.";
    }
} else {
    echo "No URL specified.";
}
?>

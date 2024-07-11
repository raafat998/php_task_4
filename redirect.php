<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    
    if (!preg_match('/^http(s)?:\/\//', $url)) {
        $url = 'http://' . $url;
    }
    
    header("Location: $url");
    exit();
} else {
    echo "URL parameter is missing.";
}
?>

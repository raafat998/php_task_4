<?php
$cookie_name = "user";
$expiry_time = time() + 10; // 10 seconds for testing purposes, replace with desired expiry time
$cookie_path = "/";
$domain = "";
$secure = false;
$httponly = true;

// Set the cookie if it doesn't exist
if (!isset($_COOKIE[$cookie_name])) {
    $cookie_value = "Raafat";
    setcookie($cookie_name, $cookie_value, $expiry_time, $cookie_path, $domain, $secure, $httponly);
    echo "Cookie '$cookie_valu' is set!<br>";
} else {
    // Cookie exists, check its value and expiry
    $cookie_value = $_COOKIE[$cookie_name];
    echo "Cookie '$cookie_name' value: $cookie_value<br>";

    // Check if cookie has expired
    if (time() >= $expiry_time) {
        setcookie($cookie_name, "", time() - 3600, $cookie_path, $domain, $secure, $httponly);
    }
}
?>

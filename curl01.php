<?php
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
// http://localhost_php5/
curl_setopt($ch, CURLOPT_URL, "http://localhost_php5/localhost/_.php");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
?>
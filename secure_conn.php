<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: secure_conn.php 
Purpose: Creates a secure connection and ensure that the page is always
		reached with a secure connection
Description & Functionality: Achieves this by checking for 'https://' instead
		of 'http://'.


 -->


<?php
    // make sure the page uses a secure connection
    $https = filter_input(INPUT_SERVER, 'HTTPS');
    if (!$https) {
        $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $url = 'https://' . $host . $uri;
        header("Location: " . $url);
        exit();
    }
?>
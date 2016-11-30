<!-- 
Author: Christian M. Adams, Chase Parker, Rachel Jackson
Program Name: reg_conn.php
Purpose: ensures Secure connection
Description & Functionality:  Redirects to https://


 -->


<?php
    // make sure the page uses a secure connection
    $https = filter_input(INPUT_SERVER, 'HTTPS');
    if ($https) {
        $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $url = 'http://' . $host . $uri;
        header("Location: " . $url);
        exit();
    }?>
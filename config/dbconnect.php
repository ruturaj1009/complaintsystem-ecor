<?php

    define('SITEURL', 'http://localhost/Railway/');

    $servername = "<your server name>";
    $username = "<your username>";
    $password = "<your password>";
    $database = "<your database name>";

    $conn = new mysqli($servername, $username, $password,$database) or die('Error');
    session_start();
?>

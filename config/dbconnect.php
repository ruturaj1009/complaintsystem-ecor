<?php

    define('SITEURL', 'http://localhost/Railway/');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "railpr";

    $conn = new mysqli($servername, $username, $password,$database) or die('Error');

    // // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";
    session_start();
?>
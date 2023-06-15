<?php
    include('../config/dbconnect.php'); 
    session_destroy();
    header('location:'.SITEURL);
?>
<?php 
    include('../config/dbconnect.php'); 
    include('logincheck.php'); 

?>

<html>
    <head>
        <title>IPAS | Admin Panel</title>

        <link rel="stylesheet" href="../assets/css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-dealer.php">Dealer</a></li>
                    <li><a href="manage-unsolved.php">Unsolved</a></li>
                    <li><a href="manage-solved.php">Solved</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->
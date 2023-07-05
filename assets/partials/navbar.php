<?php include('./config/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS Complaint Portal</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body> 

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="<?php echo SITEURL; ?>">
                        <span class="icon" >
                        <ion-icon name="train-outline"></ion-icon>
                        </span>
                        <span class="title">IPAS Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo SITEURL; ?>">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo SITEURL.'c_form.php'; ?>">
                        <span class="icon">
                        <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Complaint Registration</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo SITEURL.'s_form.php'; ?>">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Complaint Status</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <ion-icon name="information-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Support</span>
                    </a>
                </li>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br>
                <li>
                    <a href="<?php echo SITEURL.'dealer'; ?>">
                        <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Dealer Login</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo SITEURL.'admin'; ?>">
                        <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Admin Login</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>

            <script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

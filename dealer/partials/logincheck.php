 <?php
    if(!isset($_SESSION['dealer'])){
        $_SESSION['loginerror-dealer']="<div class='suck1 text-center'>Please login to continue.</div>";
        header('location:'.SITEURL.'dealer/login.php');
    }
?> 
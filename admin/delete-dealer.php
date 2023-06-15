<?php
    include('../config/dbconnect.php');

    if(isset($_GET['id']) && isset($_GET['token'])){
        $id=$_GET['id'];
        $token=$_GET['token'];


        $sql="DELETE FROM dealer WHERE id=$id AND token='$token'";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['delete-dealer']="<div class='suck2'>Dealer deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-dealer.php');
        }
        else{
            $_SESSION['delete-dealer']="<div class='suck1'>Failed to delete Dealer.</div>";
            header('location:'.SITEURL.'admin/manage-dealer.php');
        }
    }
    else{
        $_SESSION['no-dealer-found']="<div class='suck1'>Invalid Dealer.</div>";
        header('location:'.SITEURL.'admin/manage-dealer.php');
    }
?>
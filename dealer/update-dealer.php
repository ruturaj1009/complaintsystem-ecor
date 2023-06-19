<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
            <h1>Update Dealer</h1>
            <br><br>
            <?php
             if(isset($_SESSION['update-dealer'])){
                echo $_SESSION['update-dealer'];
                unset($_SESSION['update-dealer']);
            }

    if(isset($_GET['id']) && isset($_GET['token'])){
        $id=$_GET['id'];
        $token=$_GET['token'];

        $sql="SELECT * FROM dealer WHERE id='$id' AND token='$token'";
        $res=mysqli_query($conn, $sql);
        if($res==true){
            $row=mysqli_fetch_assoc($res);
            $name=$row['name'];
            $username=$row['username'];
            $email=$row['email'];
        }
        else{
            $_SESSION['no-dealer-found']="<div class='suck1'>User not found.</div>";
            header('location:'.SITEURL.'dealer/manage-about.php'); 
        }
    }
    else{
        $_SESSION['no-dealer-found']="<div class='suck1'>User not found.</div>";
        header('location:'.SITEURL.'dealer/manage-about.php');
    }


?>


            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Name : </td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                    </tr>
                    <tr>
                        <td style="min-width: 150px;">Username : </td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    <br>
                    <tr>
                        <td colspan="2">
                            <br>
                            <input type="hidden" name="id" value="<?php echo $id;?>" >
                            <input type="submit" name="submit" value="Update Details" class="btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
            <br>
        </div>
    </div>
<?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];
   $name=$_POST['name'];
   $username=$_POST['username'];
   $email1=$_POST['email'];

    $subject = 'DEALER DETAILS UPDATION EMAIL';
    $message = 'Hello! Dealer. Your updated name is '.$nm.' and username is '.$unm.' and email is '.$email;
    $headers = 'From: rutuwebdev@gmail.com';

    if(mail($email1, $subject, $message, $headers)){
        $sql1="UPDATE dealer SET 
        name='$name',
        username='$username',
        email='$email1'
        WHERE dealer.id=$id ";

        $res1=mysqli_query($conn,$sql1);
        if($res1==true){
            $_SESSION['update-dealer']="<div class='suck2'>Dealer updated successfully</div>";
            header('location:'.SITEURL.'dealer/manage-about.php');
        }
        else{
            $_SESSION['update-dealer']="<div class='suck1'>Dealer not updated</div>";
            header('location:'.SITEURL.'dealer/update-dealer.php');
        }
    }
    else{
        $_SESSION['update-dealer']="<div class='suck1'>Dealer not updated</div>";
        header('location:'.SITEURL.'dealer/update-dealer.php');
    }
   
}






?>
<?php include('partials/footer.php') ?>


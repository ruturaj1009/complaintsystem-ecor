<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br>
    <?php
        if(isset($_GET['id']) && isset($_GET['token'])){
        $id=$_GET['id'];
        $token=$_GET['token'];
        }
    ?>


    
    <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Old Password: </td>
                        <td><input type="password" name="old_pass" placeholder="Enter Old password" required></td>
                    </tr>
                    <tr>
                        <td>New Password: </td>
                        <td><input type="password" name="new_pass" placeholder="Enter new password" required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password: </td>
                        <td><input type="password" name="confirm_pass" placeholder="Confirm new password" required></td>
                    </tr>
                    <br>
                    <tr>
                        <td colspan="2">
                            <br>
                            <input type="hidden" name="id" value="<?php echo $id;?>" >
                            <input type="submit" name="submit" value="Update Password" class="btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
</div>

<?php
    if(isset($_POST['submit']))
    {
         $id=$_POST['id'];
         $old_pass = md5($_POST['old_pass']);
         $new_pass = md5($_POST['new_pass']);
         $confirm_pass = md5($_POST['confirm_pass']);
         
         $sql="SELECT * FROM dealer WHERE id=$id AND password='$old_pass' ";
         $res=mysqli_query($conn,$sql);

         if($res==true)
         {
             $count=mysqli_num_rows($res);
             if($count==1){

                if($new_pass!=$confirm_pass)
                    {
                    echo "<div class='suck1'>New Password and Confirm password not matched</div>";
                    }
                else
                    {
                    $sql1="UPDATE dealer SET
                    password='$new_pass' ";
                    $res1=mysqli_query($conn,$sql1);
                    if($res1==true)
                        {
                        $_SESSION['cngpass']="<div class='suck2'>Password Changed Successfully</div>";
                        header('location:'.SITEURL.'dealer/manage-about.php');
                        }
                    else
                        {
                        $_SESSION['cngpass']="<div class='suck1'>Failed To Change Password</div>";
                        header('location:'.SITEURL.'dealer/manage-about.php');
                        }
                    }
                    // echo "user found";
             }
             else{
                 $_SESSION['cngpass']="<div class='suck1'>USER NOT FOUND</div>";
                 header('location:'.SITEURL.'dealer/manage-dealer.php');
                // echo "user not found";
             }
         }
    }
?>


<?php include('partials/footer.php') ?>
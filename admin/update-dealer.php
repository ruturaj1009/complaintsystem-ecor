<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Dealer</h1>
        <br><br>
        <?php 
            if(isset($_GET['id']) && isset($_GET['token'])){
                $id = $_GET['id'];
                $token=$_GET['token'];
                $sql = "SELECT * FROM dealer WHERE id=$id AND token='$token'";
                $res = mysqli_query($conn, $sql);

                if($res==true){
                    $row = mysqli_fetch_assoc($res);
                    $name = $row['name'];
                    $username = $row['username'];
                    $email = $row['email'];
                }
                else{
                    $_SESSION['no-dealer-found']="<div class='suck1'>Error Occured. Try Again!</div>";
                    header('location:'.SITEURL.'admin/manage-dealer.php');
                }

            }
            else{
                $_SESSION['no-dealer-found']="<div class='suck1'>Invalid dealer.</div>";
                header('location:'.SITEURL.'admin/manage-dealer.php');
            }
        
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Name : </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Dealer" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $nm = $_POST['name'];
                $unm = $_POST['username'];
                $email = $_POST['email'];

                $subject = 'DEALER DETAILS UPDATION EMAIL';
                $message = 'Hello! Dealer. Your updated name is '.$nm.' and username is '.$unm.' and email is '.$email;
                $headers = 'From: rutuwebdev@gmail.com';

                if(mail($email, $subject, $message, $headers)){
                    $sql = "INSERT INTO dealer SET 
                    name='$name',
                    username='$username',
                    email='$email',
                    token='$token'";

                $sql2 = "UPDATE dealer SET 
                    name = '$nm',
                    username = '$unm', 
                    email='$email'
                    WHERE id=$id
                    ";
                
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true){
                    $_SESSION['update-dealer'] = "<div class='suck2'>Dealer Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-dealer.php');
                }
                else{
                    $_SESSION['update-dealer'] = "<div class='suck1'>Failed to Update Dealer.</div>";
                    header('location:'.SITEURL.'admin/update-dealer.php');
                }

                }

                

            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
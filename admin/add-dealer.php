<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Dealer</h1>

        <br>

        <?php 
        
            if(isset($_SESSION['add-dealer']))
            {
                echo $_SESSION['add-dealer'];
                unset($_SESSION['add-dealer']);
            }

        
        ?>
        <br>

        <form action="" method="POST" >

            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Dealer name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Dealer Username">
                    </td>
                </tr>
                
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="email" placeholder="Enter Dealer Email">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="pass" placeholder="Enter Dealer Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" name="submit" value="Add Dealer" class="btn-primary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
            if(isset($_POST['submit'])){

                $name = $_POST['name'];
                $username=$_POST['username'];
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $password=md5($pass);
                $token = bin2hex(random_bytes(15));
                
                $subject = 'DEALER REGISTRATION EMAIL';
                $message = 'Hello! '.$name.'. Your login username is '.$username.' and passwod is '.$pass;
                $headers = 'From: rutuwebdev@gmail.com';

                if(mail($email, $subject, $message, $headers)){
                    $sql = "INSERT INTO dealer SET 
                    name='$name',
                    username='$username',
                    email='$email',
                    password='$password',
                    token='$token'";

                $res = mysqli_query($conn, $sql);

                    
                if($res==true){
                    $_SESSION['add-dealer'] = "<div class='suck2'>Dealer Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-dealer.php');
                }
                else{
                    $_SESSION['add-dealer'] = "<div class='suck1'>Failed to Add dealer.</div>";
                    header('location:'.SITEURL.'admin/add-dealer.php');
                }

            }

                
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
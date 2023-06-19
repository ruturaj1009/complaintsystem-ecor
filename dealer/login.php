<?php
  include("../config/dbconnect.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Dealer Login</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="login">
    <h1 class="text-center">Dealer Login</h1>
    <?php
        if(isset($_SESSION['login-dealer'])){
            echo $_SESSION['login-dealer'];
            unset($_SESSION['login-dealer']);
        }
        if(isset($_SESSION['loginerror-dealer'])){
            echo $_SESSION['loginerror-dealer'];
            unset($_SESSION['loginerror-dealer']);
        }
    ?>
    <form action="" method="POST">
        <div>
        UserName:
        <input type="text" name="username" placeholder="Enter your Username">
        </div>  
        <br>
        <div>
        Password:
        <input type="password" name="password" placeholder="Enter your password">
        </div>
        <br>
        <input type="submit" value="Login" name="submit" class="btn-primary" id="lgbtn">
    </form>
    <h5 class="text-center">All Rights Reserved. Designed with 🖤 by <a href="#">Ruturaj</a></h5>
    </div>
</body>
</html>
<?php
    
    if(isset($_POST['submit'])){
       $username=$_POST['username'];
       $pass=md5($_POST['password']);

       $sql="SELECT * FROM dealer WHERE username='$username' AND password='$pass' ";
       $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        $name=mysqli_fetch_assoc($res);
        $full_name=$name['name'];
        $id=$name['id'];
        if($count==1){
            $_SESSION['login-dealer']="<div class='suck'>Hello $full_name! </div>";
            $_SESSION['dealer']=$username;
            $_SESSION['dealer-id']=$id;
            header('location:'.SITEURL.'dealer/');
        }
        else{
            $_SESSION['login-dealer']="<div class='suck1 text-center'>Username or Password Not Found</div>";
            header('location:'.SITEURL.'dealer/login.php');
        }
    }


?>
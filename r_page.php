<?php
    include('./config/dbconnect.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Complain Success</title>
    
</head>
<body style="background-color: #FCFCFC;">
   <div style="display: grid; place-items: center; ">
    <h1 style="margin-top: 7.5rem; font-size: 2.5rem;">Your Complain Registered Successfully.</h1>
    <img style="height: 200px;" src="./assets/imgs/check-green.gif">
    <h2>Your complain ID: <?php echo $id; ?></h2>
    <h3>We have sent the mail to your registered email id. Kindly check your inbox. We will get back to you soon...</h3>
    <a href="<?php echo SITEURL;?>"><button style="margin-top: 10%; width: 200px; height: 50px; background-color: #74AE3C; font-size: 20px; color: #FCFCFC; border: none; cursor: pointer;">Back To Home</button></a>
   </div> 
   
</body>
</html>
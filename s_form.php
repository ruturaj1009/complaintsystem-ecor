<?php  
    error_reporting(E_ERROR | E_PARSE);
    require_once('./config/dbconnect.php');
    if(isset($_POST['submit'])){
        $cid=$_POST['c_no'];
        $name=$_POST['name'];
        $email=$_POST['email'];

        $sql="SELECT * FROM complaints WHERE unique_id='$cid' AND email='$email'";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count!=0){
            $rows=mysqli_fetch_array($res);
            if(($email== $rows['email']) && ($cid==$rows['unique_id'])){
                header('location:'.SITEURL.'s_page.php?cid='.$cid.'&nm='.$name);
            }
           else{
            header('location:'.SITEURL.'err.php');
            }    
        }
        else{
            header('location:'.SITEURL.'err.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Complain Status</title>
    <link rel="stylesheet" href="./assets/css/form.css">
</head>
<body>
    <?php include('./assets/partials/navbar.php'); ?>
    <div class="form-style-5">
        <form action="" method="POST">
        <fieldset>
        <legend><span class="number">1</span> Complain Info :</legend>
        <input type="number" name="c_no" placeholder="Enter your Complain ID *" required>    
        </fieldset>
        <fieldset>
        <legend><span class="number">2</span> Complainer Info</legend>
        <input type="text" name="name" placeholder="Your Name " >
        <input type="email" name="email" placeholder="Your Email *" required>
        </fieldset>
        <input type="submit" name="submit" value="Submit Now" />
        </form>
        </div>
</body>
</html>
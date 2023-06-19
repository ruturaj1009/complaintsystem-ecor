<?php
    require_once('./config/dbconnect.php');
    if(isset($_GET['cid'])){
        $cid=$_GET['cid'];
        $sql="SELECT * FROM complaints WHERE unique_id='$cid'";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $rows=mysqli_fetch_array($res);
            if($rows['c_status']=='pending' && $rows['d_status']==''){
                $status='<div class="suck1">INQUEUE</div>';
            }
            elseif($rows['c_status']=='fowarded' && $rows['d_status']=='assigned'){
                $status='<div class="suck">INPROGRESS</div>';
            }
            elseif($rows['c_status']=='solved' && $rows['d_status']=='under review'){
                $status='<div class="suck">UNDER REVIEW</div>';
            }
            elseif($rows['c_status']=='solved' && $rows['d_status']=='solved'){
                $status='<div class="suck2">SOLVED</div>';
            }
            else{
                $status='<div class="suck1">ERROR!</div> ';
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
    <title>Customer Status Page</title>
    <link rel="stylesheet" href="./assets/css/admin.css">
</head>
<body>
    <div class="main" style="display: grid; place-items: center; margin: 3rem; text-align: center;">
        <h1>Hello  username</h1>
        <h3 style="font-size: 25px;">Your Complaint ID is <?php echo $cid; ?></h3>
        <!-- <img src="./assets/imgs/pending.gif" width="200px" alt="emoji"> -->
      
        <h3 style="font-size: 20px;"> Complaint is <?php echo $status; ?></h3>
        <h3>We will update you as soon as your complain resolved</h3>
    </div>
</body>
</html>
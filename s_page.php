<?php
require_once('./config/dbconnect.php');
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $sql = "SELECT * FROM complaints WHERE unique_id='$cid'";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $rows = mysqli_fetch_array($res);
        $a_review = $rows['a_review'];
        $d_review = $rows['d_review'];
        $c_description = $rows['c_description'];
        if ($rows['c_status'] == 'pending' && $rows['d_status'] == '') {
            $status = '<div class="suck1">STATUS : INQUEUE</div>';
        } elseif ($rows['c_status'] == 'fowarded' && $rows['d_status'] == 'assigned') {
            $status = '<div class="suck">STATUS : INPROGRESS</div>';
        } elseif ($rows['c_status'] == 'solved' && $rows['d_status'] == 'under review') {
            $status = '<div class="suck">STATUS : UNDER REVIEW</div>';
        } elseif ($rows['c_status'] == 'solved' && $rows['d_status'] == 'solved') {
            $status = '<div class="suck2">STATUS : SOLVED</div>';
        } else {
            $status = '<div class="suck1">ERROR!</div> ';
        }
    } else {
        header('location:' . SITEURL . 'err.php');
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
    <div style="display: grid; place-items: center;">
        <img style="margin-top: 6rem;height: 100px;" src="./assets/imgs/chk-sts.png">
        <h1 style="margin-top: 1rem; font-size: 2.5rem; color: #56d052;">Status fetched </h1>
        <div style="margin-top: 2rem; display:flex;flex-direction:column;text-align:center; line-height: 2.5rem; border: 3px solid #4cc2488f; padding: 3rem; border-radius: 1%; ">

            <h2><?php echo $status; ?></h2>
            <h2>Complaint ID : <?= $cid ?></h2>
            <h2>Complaint : <?= $c_description ?></h2>
            <?php
                if($status=='<div class="suck1">STATUS : INQUEUE</div>'){
                    echo "<h3>Dealer Not Assigned</h3>";
                }
                elseif( $status=='<div class="suck">STATUS : INPROGRESS</div>'){
                    ?>
                    <h2>Admin Remark : <?= $a_review ?> </h2>
                    <?php
                }
                else{
                    ?>
                    <h2>Admin Remark : <?= $a_review ?> </h2>
                    <h2>Dealer Remark : <?= $d_review ?> </h2>
                    <?php
                }
            ?>
            
            
        </div>
        <a href="<?php echo SITEURL; ?>"><button style="margin-top: 15%; width: 200px; height: 50px; background-color: #56d052; font-size: 20px; color: #FCFCFC; border: none; cursor: pointer;">Back
                To Home</button></a>
    </div>
</body>

</html>
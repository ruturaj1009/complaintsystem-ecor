
<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
        }
        ?>
        <br><br>
        <div class="col-3 text-center">
            <?php
                $sql="SELECT * FROM dealer";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count;?></h1>
            <br />
            Total Dealers
        </div>

        <div class="col-3 text-center">
            <?php
                $sql2="SELECT * FROM admin";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2;?></h1>
            <br />
            Total Admins
        </div>

        <div class="col-3 text-center">
            <?php
                $sql6="SELECT * FROM complaints";
                $res6=mysqli_query($conn,$sql6);
                $count6=mysqli_num_rows($res6);
            ?>
            <h1><?php echo $count6;?></h1>
            <br />
            Total Complains
        </div>

        <div class="col-3 text-center">
            <?php
                $sql3="SELECT * FROM complaints WHERE c_status='pending' AND d_status=''";
                $res3=mysqli_query($conn,$sql3);
                $count3=mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3;?></h1>
            <br />
            Pending Complains
        </div>

        <div class="col-3 text-center">
            <?php
                $sql4="SELECT * FROM complaints WHERE c_status='forwarded' AND d_status='assigned'";
                $res4=mysqli_query($conn,$sql4);
                $count4=mysqli_num_rows($res4);
            ?>
             <h1><?php echo $count4;?></h1>
            <br />
            Assigned Complains
        </div>

        <div class="col-3 text-center">
            <?php
                $sql8="SELECT * FROM complaints WHERE c_status='solved' AND d_status='under review'";
                $res8=mysqli_query($conn,$sql8);
                $count8=mysqli_num_rows($res8);
            ?>
             <h1><?php echo $count8;?></h1>
            <br />
            Complains to Viewed
        </div>

        <div class="col-4 text-center">
            <?php
                $sql5="SELECT * FROM complaints WHERE c_status!='solved'";
                $res5=mysqli_query($conn,$sql5);
                $count5=mysqli_num_rows($res5);
            ?>
             <h1><?php echo $count5;?></h1>
            <br />
            Total Unsolved Complaints
        </div>

        <div class="col-4 text-center">
            <?php
                $sql7="SELECT * FROM complaints WHERE c_status='solved' AND d_status='solved'";
                $res7=mysqli_query($conn,$sql7);
                $count7=mysqli_num_rows($res7);
            ?>
             <h1><?php echo $count7;?></h1>
            <br />
            Total Solved Complaints
        </div>

        <div class="clearfix"></div>

    </div>
   
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>
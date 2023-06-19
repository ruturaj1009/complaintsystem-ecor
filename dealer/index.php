
<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if(isset($_SESSION['login-dealer'])){
            echo $_SESSION['login-dealer'];
        }
        $id=$_SESSION['dealer-id'];
        ?>
        <br><br>
        <div class="col-4 text-center">
            <?php
                $sql="SELECT * FROM complaints WHERE d_status='assigned' AND dealer_id=$id";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count;?></h1>
            <br />
            Total Assigned
        </div>

        <div class="col-4 text-center">
            <?php
                $sql2="SELECT * FROM complaints WHERE d_status='solved' AND dealer_id=$id";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2;?></h1>
            <br />
            Total Solved 
        </div>

        <div class="clearfix"></div>

    </div>
   
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>
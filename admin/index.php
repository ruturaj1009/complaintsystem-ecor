
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
        <div class="col-4 text-center">
            <?php
                $sql="SELECT * FROM users";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count;?></h1>
            <br />
            Total Users
        </div>

        <div class="col-4 text-center">
            <?php
                $sql2="SELECT * FROM categories";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2;?></h1>
            <br />
            Total Categories
        </div>

        <div class="col-4 text-center">
            <?php
                $sql3="SELECT * FROM threads";
                $res3=mysqli_query($conn,$sql3);
                $count3=mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3;?></h1>
            <br />
            Total Threads
        </div>

        <div class="col-4 text-center">
            <?php
                $sql4="SELECT * FROM comments";
                $res4=mysqli_query($conn,$sql4);
                $count4=mysqli_num_rows($res4);
            ?>
             <h1><?php echo $count4;?></h1>
            <br />
            Total Comments
        </div>

        <div class="clearfix"></div>

    </div>
   
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>
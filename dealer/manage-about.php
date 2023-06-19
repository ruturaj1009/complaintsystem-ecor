<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper" style="width:90%">
        <h1>Dealer About</h1>
        <br><br>
        <?php
             if(isset($_SESSION['no-dealer-found'])){
                echo $_SESSION['no-dealer-found'];
                unset($_SESSION['no-dealer-found']);
            }
             if(isset($_SESSION['update-dealer'])){
                echo $_SESSION['update-dealer'];
                unset($_SESSION['update-dealer']);
            }
             if(isset($_SESSION['cngpass'])){
                echo $_SESSION['cngpass'];
                unset($_SESSION['cngpass']);
            }
            
        ?>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
                $unm=$_SESSION['dealer'];
                $sql="SELECT * FROM dealer WHERE username='$unm'";
                $res=mysqli_query($conn,$sql) or die('Error :');
                if($res==true){
                    $rows=mysqli_fetch_assoc($res);
                    $id=$rows['id'];
                    $name=$rows['name'];
                    $username=$rows['username'];
                    $email=$rows['email'];
                    $token=$rows['token'];
                }
                ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>dealer/update-dealer.php?id=<?php echo $id; ?>&token=<?php echo $token; ?>" class="btn-secondary">Update</a>
                    <a href="<?php echo SITEURL; ?>dealer/change-password.php?id=<?php echo $id; ?>&token=<?php echo $token; ?>" class="btn-primary">change-password</a>
                </td>
            </tr>
        </table>
    </div>
</div>


<?php include('partials/footer.php'); ?>
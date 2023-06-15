<?php  include('partials/menu.php');
    $u_ser=$_SESSION['user'];
    $sql1="SELECT * FROM admin WHERE username='$u_ser'";
    $res1=mysqli_query($conn,$sql1);
    if($res1==true){
       $master=mysqli_fetch_assoc($res1)['master'];
    }

    ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br>
        <br>
        <?php 
            if(isset($_SESSION['add-admin'])){
                echo $_SESSION['add-admin'];
                unset($_SESSION['add-admin']);
            }
            if(isset($_SESSION['delete-admin'])){
                echo $_SESSION['delete-admin'];
                unset($_SESSION['delete-admin']);
            }
            if(isset($_SESSION['update-admin'])){
                echo $_SESSION['update-admin'];
                unset($_SESSION['update-admin']);
            }
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if(isset($_SESSION['cngpass'])){
                echo $_SESSION['cngpass'];
                unset($_SESSION['cngpass']);
            }
        ?>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full_name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>

            <?php
                $sql="SELECT * FROM admin";
                $res=mysqli_query($conn,$sql) or die('Error :');
                if($res==true){
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $name=$rows['full_name'];
                            $user=$rows['username'];

                        ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $user; ?></td>
                                <td>
                                    <?php
                                        if($master=='true'){
                                            ?>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            <?php
                                        }

                                        if($user==$_SESSION['user']){
                                            ?>
                                                
                                                <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <?php
                                        }
                                    ?>
                                    
                                    
                                </td>
                            </tr>
                            <?php


                        }
                    }
                }
                


            ?>
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper" style="width:90%">
        <h1>Manage Dealer</h1>
        <br>
        <a href="<?php echo SITEURL; ?>admin/add-dealer.php" class="btn-primary">Add Dealer</a>
        <br><br>
        <?php
             if(isset($_SESSION['no-dealer-found'])){
                echo $_SESSION['no-dealer-found'];
                unset($_SESSION['no-dealer-found']);
            }
             if(isset($_SESSION['add-dealer'])){
                echo $_SESSION['add-dealer'];
                unset($_SESSION['add-dealer']);
            }
             if(isset($_SESSION['delete-dealer'])){
                echo $_SESSION['delete-dealer'];
                unset($_SESSION['delete-dealer']);
            }
             if(isset($_SESSION['update-dealer'])){
                echo $_SESSION['update-dealer'];
                unset($_SESSION['update-dealer']);
            }
            
        ?>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
                $sql="SELECT * FROM dealer";
                $res=mysqli_query($conn,$sql) or die('Error :');
                if($res==true){
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $name=$rows['name'];
                            $username=$rows['username'];
                            $email=$rows['email'];
                            $token=$rows['token'];
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $email; ?></td>
                                <td>

                                    <a href="<?php echo SITEURL; ?>admin/update-dealer.php?id=<?php echo $id; ?>&token=<?php echo $token; ?>" class="btn-secondary">Update</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-dealer.php?id=<?php echo $id; ?>&token=<?php echo $token; ?>" class="btn-danger">Delete</a>
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


<?php include('partials/footer.php'); ?>
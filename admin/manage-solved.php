
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Solved Complaint</h1>
        <br><br>
        <?php
            if(isset($_SESSION['delete-solved'])){
                echo $_SESSION['delete-solved'];
                unset($_SESSION['delete-solved']);
            }
            if(isset($_SESSION['update-solved'])){
                echo $_SESSION['update-solved'];
                unset($_SESSION['update-solved']);
            }
            if(isset($_SESSION['no-solved-found'])){
                echo $_SESSION['no-solved-found'];
                unset($_SESSION['no-solved-found']);
            }
        ?>
        <br><br>
        <table class="tbl-full">
            <tr>
            <th>S.N</th>
                <th>ID</th>
                <th>Division</th>
                <th>Section</th>
                <th>UserID</th>
                <th>Description</th>
                <th>Complainer</th>
                <th>Dealer</th>
                <th>Dealer Review</th>
                <th>Admin Review</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
                $sql="SELECT * FROM complaints WHERE c_status='solved'";
                $res=mysqli_query($conn,$sql) or die('Error :');
                if($res==true){
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $d_id=$rows['div_id'];
                            $s_id=$rows['sec_id'];
                            $u_id=$rows['user_id'];
                            $complain=$rows['c_description'];
                            $c_id=$rows['unique_id'];
                            $name=$rows['name'];

                            $c_status=$rows['c_status'];
                            $d_status=$rows['d_status'];
                            $d_review=$rows['d_review'];
                            $a_review=$rows['a_review'];
                            $de_id=$rows['dealer_id'];
                            $sql1="SELECT name FROM dealer WHERE id='$de_id'";
                            $res1=mysqli_query($conn,$sql1) or die();
                            $count1=mysqli_num_rows($res1);
                            if($count!=1){
                                $dnm = 'deleted dealer';
                            }
                            else{
                                $dnm=mysqli_fetch_assoc($res1)['name'];
                            }


                        ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $c_id; ?></td>
                                <td><?php echo $d_id; ?></td>
                                <td ><?php echo $s_id; ?></td>
                                <td ><?php echo $u_id; ?></td>
                                <td ><?php echo $complain; ?></td>
                                <td ><?php echo $name; ?></td>
                                <td ><?php echo $dnm; ?></td>
                                <td ><?php echo $d_review; ?></td>
                                <td ><?php echo $a_review; ?></td>
                                <td ><?php echo $d_status; ?></td>
                                <td>
                                    <?php
                                    if($c_status=='solved' && $d_status=='under review'){
                                        ?>
                                        <a href="<?php echo SITEURL; ?>admin/update-solved.php?id=<?php echo $id; ?>&cid=<?php echo $c_id; ?>" class="btn-secondary">Update</a>
                                        <?php
                                    }
                                    elseif($c_status=='solved' && $d_status=='solved'){
                                        echo 'SOLVED';
                                    }
                                    else{
                                        echo 'Technical Error';
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
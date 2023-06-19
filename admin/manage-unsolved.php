
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Unsolved Complaints</h1>
        <br><br>
        <?php
            if(isset($_SESSION['no-unsolved-found'])){
                echo $_SESSION['no-unsolved-found'];
                unset($_SESSION['no-unsolved-found']);
            }
            if(isset($_SESSION['update-unsolved'])){
                echo $_SESSION['update-unsolved'];
                unset($_SESSION['update-unsolved']);
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
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
                $sql="SELECT * FROM complaints WHERE c_status!='solved'";
                $res=mysqli_query($conn,$sql) or die('Error :');
                if($res==true){
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $d_id=$rows['div_id'];
                            $sql8="SELECT UNIT_DESC FROM div_master WHERE UNIT='$d_id'";
                            $res8=mysqli_query($conn,$sql8);
                            $div_name=mysqli_fetch_array($res8)['UNIT_DESC'];


                            $s_id=$rows['sec_id'];
                            $sql9="SELECT SECTIONDESC FROM section_master WHERE SECTIONCODE='$s_id'";
                            $res9=mysqli_query($conn,$sql9);
                            $sec_name=mysqli_fetch_array($res9)['SECTIONDESC'];

                            $u_id=$rows['user_id'];
                            $complain=$rows['c_description'];
                            $c_id=$rows['unique_id'];
                            $name=$rows['name'];
                            $c_status=$rows['c_status'];
                            $d_status=$rows['d_status'];
                            $de_id=$rows['dealer_id'];

                        ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $c_id; ?></td>
                                <td><?php echo $div_name; ?></td>
                                <td><?php echo $sec_name; ?></td>
                                <td><?php echo $u_id; ?></td>
                                <td><?php echo $complain;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $c_status;?></td>
                                <td>
                                <?php
                                    if($c_status=='pending' && $d_status==''){
                                        ?>
                                            <a href="<?php echo SITEURL; ?>admin/update-unsolved.php?id=<?php echo $id; ?>&cid=<?php echo $c_id; ?>" class="btn-secondary">Forward</a>
                                        <?php
                                    }
                                    elseif($c_status=='forwarded' && $d_status=='assigned'){
                                        $sql1="SELECT * FROM dealer WHERE id='$de_id'";
                                        $res1=mysqli_query($conn,$sql1);
                                        $count1=mysqli_num_rows($res1);
                                        if($count1==1){
                                            echo $d_status.' to '.mysqli_fetch_assoc($res1)['name'];
                                        }
                                        else{
                                            echo $d_status.' to deleted dealer';
                                        }
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
                    else{
                        echo "<div class='suck2'>Complaint not added</div>";
                    }
                }
                


            ?>
        </table>

    </div>
</div>


<?php include('partials/footer.php') ?>
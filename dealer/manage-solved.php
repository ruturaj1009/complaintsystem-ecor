
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Solved Complaints</h1>
        <br><br>
        <?php
            if(isset($_SESSION['update-assigned'])){
                echo $_SESSION['update-assigned'];
                unset($_SESSION['update-assigned']);
            }
            
            
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>ID</th>
                <th>Description</th>
                <th>Remark</th>
                <th>Admin Remark</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
                $dd_id=$_SESSION['dealer-id'];
                $sql="SELECT * FROM complaints WHERE c_status='solved' AND dealer_id='$dd_id'";
                $res=mysqli_query($conn,$sql) or die('Error :');
                if($res==true){
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $complain=$rows['c_description'];
                            $c_id=$rows['unique_id'];
                            $c_status=$rows['c_status'];
                            $d_status=$rows['d_status'];
                            $d_review=$rows['d_review'];
                            $a_review=$rows['a_review'];

                        ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $c_id; ?></td>
                                <td><?php echo $complain;?></td>
                                <td><?php echo $d_review;?></td>
                                <td><?php echo $a_review;?></td>
                                <td><?php echo $c_status;?></td>
                                <td>
                                <?php
                                    if($c_status=='solved' && $d_status=='under review'){
                                        echo '<div class="suck">pending for review</div>';
                                    }
                                    elseif($c_status=='solved' && $d_status=='solved'){
                                        echo '<div class="suck2">SOLVED</div>';
                                    }
                                    else{
                                        echo '<div class="suck1">Technical Error</div>';
                                    }

                                ?>
                                    
                                </td>
                            </tr>
                            <?php


                        }
                    }
                    else{
                        echo "<div class='suck2'>Complaint not assigned</div>";
                    }
                }
                


            ?>
        </table>

    </div>
</div>


<?php include('partials/footer.php') ?>
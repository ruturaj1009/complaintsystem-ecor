<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Unsolved</h1>
        <br><br>
        <?php 
            if(isset($_GET['id']) && isset($_GET['cid'])){
                $id = $_GET['id'];
                $cid=$_GET['cid'];
                $sql = "SELECT * FROM complaints WHERE id=$id AND unique_id='$cid'";
                $res = mysqli_query($conn, $sql);

                if($res==true){
                    $rows = mysqli_fetch_assoc($res);
                    $d_id=$rows['div_id'];
                    $s_id=$rows['sec_id'];
                    $u_id=$rows['user_id'];
                    $complain=$rows['c_description'];
                    $name=$rows['name'];
                    $email=$rows['email'];
                    $phone=$rows['phone'];
                                
                }
                else{
                    $_SESSION['no-solved-found']="<div class='suck1'>Error Occured. Try Again!</div>";
                    header('location:'.SITEURL.'admin/manage-unsolved.php');
                }

            }
            else{
                $_SESSION['no-unsolved-found']="<div class='suck1'>Invalid  Complaint.</div>";
                header('location:'.SITEURL.'admin/manage-unsolved.php');
            }
        
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td style="max-width:100px;">Complain ID : </td>
                    <td>
                        <?php echo $cid; ?>
                    </td>
                </tr>
                <tr>
                    <td style="min-width:150px;">Division : </td>
                    <td>
                        <?php echo $d_id; ?>
                    </td>
                </tr>
                <tr>
                    <td style="max-width:100px;">Section : </td>
                    <td>
                        <?php echo $s_id; ?>
                    </td>
                </tr>
                <tr>
                    <td style="max-width:100px;">User ID : </td>
                    <td>
                        <?php echo $u_id; ?>
                    </td>
                </tr>

                <tr>
                    <td style="max-width:100px;">Complain : </td>
                    <td><?php echo $complain; ?></td>
                </tr>

                <tr>
                    <td style="max-width:200px;">Complainer : </td>
                    <td><?php echo $name; ?></td>
                </tr>

                <tr>
                    <td style="max-width:100px;">Email : </td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td style="max-width:100px;">Phone : </td>
                    <td><?php echo $phone; ?></td>
                </tr>

                <tr>
                    <td style="max-width:100px;">Dealer : </td>
                    <td>
                        <Select name="dealer">
                        <?php 
                                
                                $sql2 = "SELECT * FROM dealer ";
                                $res2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($res2);

                                if($count2>0){

                                    while($row2=mysqli_fetch_assoc($res2)){
                                        
                                        $id2 = $row2['id'];
                                        $name2 = $row2['name'];
                                        ?>

                                        <option  value="<?php echo $id2; ?>"><?php echo $name2; ?></option>

                                        <?php
                                    }
                                }
                                else{

                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            

                            ?>
                        

                        </Select>
                    </td>
                </tr>
                <tr>
                    <td>
                    <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Assign Dealer" class="btn-primary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $de_id = $_POST['dealer'];
                $c_status='forwarded';
                $d_status='assigned';

                $sql3 = "UPDATE complaints SET 
                    dealer_id = '$de_id',
                    c_status = '$c_status', 
                    d_status = '$d_status' 
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true){
                    $_SESSION['update-unsolved'] = "<div class='suck2'>Dealer assigned successfully</div>";
                    header('location:'.SITEURL.'admin/manage-unsolved.php');
                }
                else{
                    $_SESSION['update-unsolved'] = "<div class='suck1'>Dealer assigned Failed</div>";
                    header('location:'.SITEURL.'admin/update-unsolved.php');
                }

            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
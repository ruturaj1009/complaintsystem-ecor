<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Solved</h1>
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
                    $de_id=$rows['dealer_id'];
                    $complain=$rows['c_description'];
                    $name=$rows['name'];
                    $email=$rows['email'];
                    $phone=$rows['phone'];
                    $d_remark=$rows['d_review'];
                                
                }
                else{
                    $_SESSION['no-solved-found']="<div class='suck1'>Error Occured. Try Again!</div>";
                    header('location:'.SITEURL.'admin/manage-solved.php');
                }

            }
            else{
                $_SESSION['no-solved-found']="<div class='suck1'>Invalid Complain.</div>";
                header('location:'.SITEURL.'admin/manage-solved.php');
            }
        
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Complain ID : </td>
                    <td>
                        <?php echo $cid; ?>
                    </td>
                </tr>
                <tr>
                    <td>Division : </td>
                    <td>
                        <?php echo $d_id; ?>
                    </td>
                </tr>
                <tr>
                    <td>Section : </td>
                    <td>
                        <?php echo $s_id; ?>
                    </td>
                </tr>
                <tr>
                    <td>User ID : </td>
                    <td>
                        <?php echo $u_id; ?>
                    </td>
                </tr>

                <tr>
                    <td>Complain : </td>
                    <td><?php echo $complain; ?></td>
                </tr>

                <tr>
                    <td style="min-width:150px;">Complainer : </td>
                    <td><?php echo $name; ?></td>
                </tr>

                <tr>
                    <td>Email : </td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td>Phone : </td>
                    <td><?php echo $phone; ?></td>
                </tr>

                <tr>
                    <td>Dealer : </td>
                    <td>
                        <?php  
                                $sql2 = "SELECT * FROM dealer WHERE id=$de_id";
                                $res2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($res2);

                                if($count2!=1){
                                        echo "deleted dealer";
                                    }
                                else{
                                    echo $dnm=mysqli_fetch_assoc($res2)['name'];
                                }
                            

                            ?>
                        
                    </td>
                </tr>
                <tr>
                    <td>Dealer Remarks : </td>
                    <td><?php echo $d_remark; ?></td>
                </tr>
                <tr>
                    <td>Remarks : </td>
                    <td>
                        <textarea name="a_review" cols="30" rows="5" placeholder="Drop your Remarks..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="submit" name="submit" value="Mark as Viewed" class="btn-primary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $a_review=$_POST['a_review'];
                $d_status='solved';

                $subject = 'COMPLAIN RESOLVED EMAIL';
                $message = 'Hello! '.$name.'. Your Complain is successfully resolved. Check your status at our page.';
                $headers = 'From: rutuwebdev@gmail.com';

                if(mail($email, $subject, $message, $headers)){

                    $sql3 = "UPDATE complaints SET 
                    a_review = '$a_review',
                    d_status = '$d_status' 
                    WHERE id=$id";

                    $res3 = mysqli_query($conn, $sql3);

                    if($res3==true){
                        $_SESSION['update-solved'] = "<div class='suck2'>Complain solved successfully</div>";
                        header('location:'.SITEURL.'admin/manage-solved.php');
                    }
                    else{
                        $_SESSION['update-solved'] = "<div class='suck1'>Complain solved Failed</div>";
                        header('location:'.SITEURL.'admin/update-solved.php');
                    }
                   
                }
                

            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
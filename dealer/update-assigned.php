<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Assigned</h1>
        <br><br>
        <?php
        if (isset($_SESSION['update-assigned'])) {
            echo $_SESSION['update-assigned'];
            unset($_SESSION['update-assigned']);
        }
        ?>
        <br><br>
        <?php
        if (isset($_GET['id']) && isset($_GET['cid'])) {
            $id = $_GET['id'];
            $cid = $_GET['cid'];
            $sql = "SELECT * FROM complaints WHERE id=$id AND unique_id='$cid'";
            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $rows = mysqli_fetch_assoc($res);
                $d_id = $rows['div_id'];
                $sql8 = "SELECT UNIT_DESC FROM div_master WHERE UNIT='$d_id'";
                $res8 = mysqli_query($conn, $sql8);
                $div_name = mysqli_fetch_array($res8)['UNIT_DESC'];


                $s_id = $rows['sec_id'];
                $sql9 = "SELECT SECTIONDESC FROM section_master WHERE SECTIONCODE='$s_id'";
                $res9 = mysqli_query($conn, $sql9);
                $sec_name = mysqli_fetch_array($res9)['SECTIONDESC'];

                $u_id = $rows['user_id'];
                $de_id = $rows['dealer_id'];
                $complain = $rows['c_description'];
                $name = $rows['name'];
                $email = $rows['email'];
                $phone = $rows['phone'];
                $a_remark = $rows['a_review'];
            } else {
                $_SESSION['no-assigned-found'] = "<div class='suck1'>Error Occured. Try Again!</div>";
                header('location:' . SITEURL . 'dealer/manage-assigned.php');
            }
        } else {
            $_SESSION['no-assigned-found'] = "<div class='suck1'>Invalid Complain.</div>";
            header('location:' . SITEURL . 'dealer/manage-assigned.php');
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
                        <?php echo $div_name; ?>
                    </td>
                </tr>
                <tr>
                    <td>Section : </td>
                    <td>
                        <?php echo $sec_name; ?>
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
                    <td>Admin Remarks : </td>
                    <td><?php echo $a_remark; ?></td>
                </tr>

                <tr>
                    <td>Dealer : </td>
                    <td>
                        <?php
                        $sql2 = "SELECT * FROM dealer WHERE id=$de_id";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);

                        if ($count2 != 1) {
                            echo "deleted dealer";
                        } else {
                            echo $dnm = mysqli_fetch_assoc($res2)['name'];
                        }


                        ?>

                    </td>
                </tr>
                <tr>
                    <td>Remarks : </td>
                    <td>
                        <textarea name="d_review" cols="30" rows="5" placeholder="Drop your Remarks..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Mark as Solved" class="btn-primary">
                    </td>
                </tr>

            </table>

        </form>

        <?php

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $d_review = $_POST['d_review'];
            $c_status = 'solved';
            $d_status = 'under review';


            $sql3 = "UPDATE complaints SET 
                        d_review = '$d_review',
                        c_status = '$c_status',
                        d_status = '$d_status' 
                        WHERE id=$id";

            $res3 = mysqli_query($conn, $sql3);

            if ($res3 == true) {
                $_SESSION['update-assigned'] = "<div class='suck2'>Complain solved successfully</div>";
                header('location:' . SITEURL . 'dealer/manage-solved.php');
            } else {
                $_SESSION['update-assigned'] = "<div class='suck1'>Complain solved Failed</div>";
                header('location:' . SITEURL . 'dealer/update-assigned.php');
            }
        }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
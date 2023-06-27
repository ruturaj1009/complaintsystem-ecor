<?php
// error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['submit'])) {
    require_once('./config/dbconnect.php');
    $division = $_POST['division'];
    $section = $_POST['section'];
    $userid = $_POST['userid'];
    $complain = $_POST['complain'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $uniqueid = rand(0000000, 9999999);

    $subject = 'COMPLAIN REGISTRATION EMAIL';
    $message = 'Hello! ' . $name . '. Your Complain is successfully registered with complain ID : ' . $uniqueid . '. Check your status at our page.';
    $headers = 'From: rutuwebdev@gmail.com';

    if (mail($email, $subject, $message, $headers)) {


        $sql = "INSERT INTO complaints SET
                div_id='$division',
                sec_id='$section',
                user_id='$userid',
                c_description='$complain',
                unique_id='$uniqueid',
                name='$name',
                email='$email',
                phone='$phone',
                c_status='pending'";

        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            header('location:' . SITEURL . 'r_page.php?id=' . $uniqueid);
        } else {
            header('location:' . SITEURL);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Complain Form</title>
    <link rel="stylesheet" href="./assets/css/form.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#div_m").change(function() {
                var d_id = $(this).val();
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        divID: d_id
                    },
                    success: function(data) {
                        $("#sec_m").html(data);
                    }
                });
            });

            $("#sec_m").change(function() {
                var c_id = $('#div_m').val();
                var s_id = $(this).val();
                $.ajax({
                    url: "action1.php",
                    method: "POST",
                    data: {
                        divIDS: c_id,
                        secIDS: s_id
                    },
                    success: function(data1) {
                        $("#user_m").html(data1);
                    }
                });
            });

        });
    </script>
</head>

<body>
    <?php
    include('assets/partials/navbar.php');

    ?>
    <div class="form-style-5">
        <form action="" method="POST">
            <fieldset>
                <legend><span class="number">1</span> Complain Info :</legend>
                <label for="job">Division/HQ :</label>
                <select id="div_m" name="division">
                    <option value="" disabled selected>-- SELECT DIVISION --</option>
                    <?php
                    $sql = "SELECT * FROM div_master ";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <option value="<?= $row['UNIT'] ?>"><?= $row['UNIT_DESC'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="job">Section :</label>
                <select id="sec_m" name="section">
                    <option value="" disabled selected>-- SELECT DIVISION FIRST --</option>
                </select>
                <label for="job">User ID :</label>
                <select id="user_m" name="userid">
                    <option value="" disabled selected>-- SELECT SECTION FIRST --</option>
                </select>
                <textarea name="complain" rows="5" placeholder="Drop Your Complain Here..."></textarea>
            </fieldset>
            <fieldset>
                <legend><span class="number">2</span> Complainer Info</legend>
                <input type="text" name="name" placeholder="Your Name *" required>
                <input type="email" name="email" placeholder="Your Email *" required>
                <input type="number" min="1000000000" max="9999999999" name="phone" placeholder="Your Mobile *" required>
            </fieldset>
            <input type="submit" name="submit" value="Submit Now" />
        </form>
    </div>
</body>

</html>
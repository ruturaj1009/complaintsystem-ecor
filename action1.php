<?php
    require_once('./config/dbconnect.php');
    $output1='';
    $sid=$_POST['secIDS'];
    $did=$_POST['divIDS'];
    $sql1="SELECT * FROM section_waise_userid WHERE DIVISION='$did' AND SECTIONCODE='$sid'";
    $res1=mysqli_query($conn,$sql1);
    $count=mysqli_num_rows($res1);
    if($count==0){
        $output1.='<option value="0" disabled selected>-- NO USERID FOUND FOR THIS SECTION AND DIVISION --</option>';
    } else{
        $output1.='<option value="0" selected>-- SELECT USERID --</option>';
        while($row=mysqli_fetch_array($res1)){
        $output1.='<option value="'.$row['USER_ID'].'">'.$row['USER_ID'].'</option>';
    }
    }
    
    echo $output1;
?>
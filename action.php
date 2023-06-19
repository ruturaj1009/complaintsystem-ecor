<?php
    require_once('./config/dbconnect.php');
    $output='';
    $sql="SELECT * FROM section_master ";
    $res=mysqli_query($conn,$sql);
    $output.='<option value="" disabled selected>-- SELECT SECTION --</option>';
    while($row=mysqli_fetch_array($res)){
        $output.='<option value="'.$row['SECTIONCODE'].'">'.$row['SECTIONDESC'].'</option>';
    }
    echo $output;
?>

<?php include('../config/_dbconnect.php');  ?>


<?php
 $id=$_GET['id'];
 $sql = "DELETE FROM admin WHERE id=$id";

 $res=mysqli_query($conn,$sql);
 if($res==true){
    echo $_SESSION['delete-admin']="<div class='suck2'>Admin deleted successfully</div>";
    header('location:manage-admin.php');
 }
 else{
    echo $_SESSION['delete-admin']="<div class='suck1'>Admin deleted Failed!</div>";
    header('location:manage-admin.php');
 }

?>
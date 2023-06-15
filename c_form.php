
<?php
  // error_reporting(E_ERROR | E_PARSE);
  if(isset($_POST['submit'])){
    require_once('./config/dbconnect.php');
    $division=$_POST['division'];
    $section=$_POST['section'];
    $userid=$_POST['userid'];
    $complain=$_POST['complain'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $uniqueid=rand(0000000,9999999);

    $sql="INSERT INTO complaints SET
          div_id='$division',
          sec_id='$section',
          user_id='$userid',
          c_description='$complain',
          unique_id='$uniqueid',
          name='$name',
          email='$email',
          phone='$phone',
          c_status='pending'
          ";
    
    $res=mysqli_query($conn,$sql);
    if($res==true){
      header('location:'.SITEURL.'r_page.php?id='.$uniqueid);
    }
    else{
      header('location:'.SITEURL);
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
        <select id="job" name="division">
        <optgroup label="Indoors">
          <option value="fishkeeping">Fishkeeping</option>
          <option value="reading">Reading</option>
          <option value="boxing">Boxing</option>
          <option value="debate">Debate</option>
          <option value="gaming">Gaming</option>
          <option value="snooker">Snooker</option>
          <option value="other_indoor">Other</option>
        </optgroup>
        </select>
        <label for="job">Section :</label>
        <select id="job" name="section">
        <optgroup label="Indoors">
          <option value="fishkeeping">Fishkeeping</option>
          <option value="reading">Reading</option>
          <option value="boxing">Boxing</option>
          <option value="debate">Debate</option>
          <option value="gaming">Gaming</option>
          <option value="snooker">Snooker</option>
          <option value="other_indoor">Other</option>
        </optgroup>
        </select>
        <label for="job">User ID :</label>
        <select id="job" name="userid">
        <optgroup label="Indoors">
          <option value="fishkeeping">Fishkeeping</option>
          <option value="reading">Reading</option>
          <option value="boxing">Boxing</option>
          <option value="debate">Debate</option>
          <option value="gaming">Gaming</option>
          <option value="snooker">Snooker</option>
          <option value="other_indoor">Other</option>
        </optgroup>
        </select>
        <textarea name="complain" rows="5" placeholder="Drop Your Complain Here..."></textarea>      
        </fieldset>
        <fieldset>
        <legend><span class="number">2</span> Complainer Info</legend>
        <input type="text" name="name" placeholder="Your Name *" required>
        <input type="email" name="email" placeholder="Your Email *" required>
        <input type="tel" name="phone" placeholder="Your Mobile *" required>
        </fieldset>
        <input type="submit" name="submit" value="Submit Now" />
        </form>
        </div>
</body>
</html>



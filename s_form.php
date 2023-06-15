<?php 
    include('./assets/partials/navbar.php'); 
    if(isset($_POST['submit'])){
        echo "hi";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Complain Status</title>
    <link rel="stylesheet" href="./assets/css/form.css">
</head>
<body>
    
    <div class="form-style-5">
        <form action="" method="POST">
        <fieldset>
        <legend><span class="number">1</span> Complain Info :</legend>
        <input type="number" name="c_no" placeholder="Enter your Complain ID *" required>    
        </fieldset>
        <fieldset>
        <legend><span class="number">2</span> Complainer Info</legend>
        <input type="text" name="name" placeholder="Your Name " >
        <input type="email" name="email" placeholder="Your Email *" >
        <p style="text-align: center;">OR</p>
        <br>
        <input type="tel" name="phone" placeholder="Your Mobile *" >
        </fieldset>
        <input type="submit" name="submit" value="Submit Now" />
        </form>
        </div>
</body>
</html>
<?php
include("../config/dbconnect.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM dealer WHERE username='$username' AND password='$pass' ";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $name = mysqli_fetch_assoc($res);
    $full_name = $name['name'];
    $id = $name['id'];
    if ($count == 1) {
        $_SESSION['login-dealer'] = "<div class='suck'>Hello $full_name! </div>";
        $_SESSION['dealer'] = $username;
        $_SESSION['dealer-id'] = $id;
        header('location:' . SITEURL . 'dealer/');
    } else {
        $_SESSION['login-dealer'] = "<div class='suck1 text-center'>Username or Password Not Found</div>";
        header('location:' . SITEURL . 'dealer/login.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Dealer Login</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <style>
        body {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1980' height='1080' preserveAspectRatio='none' viewBox='0 0 1980 1080'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1077%26quot%3b)' fill='none'%3e%3crect width='1980' height='1080' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M0%2c736.881C138.998%2c731.461%2c259.115%2c658.339%2c384.856%2c598.848C529.862%2c530.243%2c734.613%2c511.531%2c792.511%2c361.928C851.046%2c210.677%2c681.796%2c65.716%2c652.946%2c-93.88C625.622%2c-245.034%2c712.263%2c-415.869%2c628.622%2c-544.704C543.681%2c-675.541%2c369.915%2c-706.668%2c222.326%2c-757.174C68.321%2c-809.876%2c-97.967%2c-907.766%2c-248.027%2c-844.701C-398.419%2c-781.496%2c-423.609%2c-581.533%2c-515.817%2c-446.958C-595.302%2c-330.953%2c-712.994%2c-243.13%2c-752.654%2c-108.215C-795.8%2c38.556%2c-812.828%2c203.04%2c-747.568%2c341.403C-682.552%2c479.25%2c-539.362%2c558.365%2c-404.642%2c629.635C-278.751%2c696.234%2c-142.314%2c742.431%2c0%2c736.881' fill='%230b2035'%3e%3c/path%3e%3cpath d='M1980 1950.02C2141.418 1939.487 2203.246 1726.5549999999998 2338.202 1637.373 2470.552 1549.912 2686.929 1577.1019999999999 2758.534 1435.5439999999999 2829.678 1294.898 2693.2380000000003 1136.688 2670.351 980.7429999999999 2647.556 825.423 2725.051 642.096 2624.4030000000002 521.622 2523.846 401.256 2336.885 413.29999999999995 2181.1 395.115 2047.687 379.54200000000003 1921.175 412.33000000000004 1787.356 423.914 1614.46 438.88 1396.275 344.629 1279.654 473.14700000000005 1163.8200000000002 600.797 1292.1950000000002 807.655 1282.9479999999999 979.779 1274.795 1131.532 1167.962 1283.8029999999999 1228.618 1423.145 1289.3609999999999 1562.686 1465.833 1598.7910000000002 1590.44 1686.167 1721.5059999999999 1778.071 1820.263 1960.443 1980 1950.02' fill='%23123559'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1077'%3e%3crect width='1980' height='1080' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
            color: aliceblue;
        }

        .login {
            height: 350px;
            /* text-align: center; */
            font-size: 18px;
            background-color: rgba(255, 255, 255, 0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        form div {
            display: flex;
            flex-direction: column;
            margin-top: 25px;
        }

        form input {
            height: 30px;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        #lgbtn {
            margin-top: 49px;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1 class="text-center">Dealer Login</h1>
        <?php
        if (isset($_SESSION['login-dealer'])) {
            echo $_SESSION['login-dealer'];
            unset($_SESSION['login-dealer']);
        }
        if (isset($_SESSION['loginerror-dealer'])) {
            echo $_SESSION['loginerror-dealer'];
            unset($_SESSION['loginerror-dealer']);
        }
        ?>
        <form action="" method="POST">
            <div>
                <label for="username">Username : </label>
                <input type="text" name="username" placeholder="Enter your Username">
            </div>
            <div>
                <label for="password">Password : </label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <input type="submit" value="Login" name="submit" class="btn-primary" id="lgbtn">
        </form>
        <h5 class="text-center">All Rights Reserved. Designed by <a href="https://rutu-raj-portfolio.netlify.app" style="text-decoration:none; color:cornflowerblue;">Ruturaj</a></h5>
    </div>
</body>

</html>
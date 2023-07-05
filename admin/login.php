<?php
include("../config/dbconnect.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$pass' ";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $name = mysqli_fetch_assoc($res);
    $full_name = $name['full_name'];
    $id = $name['id'];
    if ($count == 1) {
        $_SESSION['login'] = "<div style='color:#000;text-align:center;'>Login successfully as $full_name </div>";
        $_SESSION['user'] = $username;
        header('location:' . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = "<div style='color:#000; text-align:center;'>Username or Password Not Found</div>";
        header('location:' . SITEURL . 'admin/login.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAS | Admin Login</title>
    <!-- <link rel="stylesheet" href="../assets/css/admin.css"> -->
    <style>
        body {
            
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1980' height='800' preserveAspectRatio='none' viewBox='0 0 1980 800'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1233%26quot%3b)' fill='none'%3e%3crect width='1980' height='800' x='0' y='0' fill='url(%26quot%3b%23SvgjsLinearGradient1234%26quot%3b)'%3e%3c/rect%3e%3cpath d='M1658.72 100.77 a140.01 140.01 0 1 0 280.02 0 a140.01 140.01 0 1 0 -280.02 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M903.029%2c732.422C927.491%2c732.026%2c948.791%2c717.249%2c961.077%2c696.093C973.421%2c674.835%2c975.438%2c649.134%2c964.044%2c627.352C951.756%2c603.862%2c929.525%2c584.259%2c903.029%2c585.126C877.571%2c585.959%2c860.73%2c608.755%2c848.561%2c631.132C837.082%2c652.241%2c830.251%2c676.866%2c841.631%2c698.028C853.539%2c720.172%2c877.889%2c732.829%2c903.029%2c732.422' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1989.144%2c906.244C2035.185%2c906.749%2c2082.46%2c890.637%2c2105.466%2c850.753C2128.46%2c810.89%2c2117.73%2c762.489%2c2095.217%2c722.353C2072.103%2c681.146%2c2036.391%2c643.508%2c1989.144%2c643.376C1941.727%2c643.243%2c1904.781%2c680.149%2c1882.038%2c721.756C1860.347%2c761.44%2c1854.451%2c809.137%2c1877.158%2c848.249C1899.78%2c887.214%2c1944.091%2c905.75%2c1989.144%2c906.244' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M104.69 663.77 a196.17 196.17 0 1 0 392.34 0 a196.17 196.17 0 1 0 -392.34 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M434.199%2c524.532C495.851%2c519.875%2c532.16%2c461.122%2c560.411%2c406.126C585.568%2c357.154%2c600.203%2c300.969%2c573.884%2c252.611C546.528%2c202.349%2c491.377%2c176.53%2c434.199%2c174.233C372.18%2c171.741%2c307.334%2c188.432%2c273.62%2c240.547C237.225%2c296.806%2c237.012%2c369.737%2c269.993%2c428.063C303.483%2c487.29%2c366.352%2c529.657%2c434.199%2c524.532' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M922.79 773.16 a221.3 221.3 0 1 0 442.6 0 a221.3 221.3 0 1 0 -442.6 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1075.91 224.51 a178.65 178.65 0 1 0 357.3 0 a178.65 178.65 0 1 0 -357.3 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M719.55%2c683.732C760.25%2c684.426%2c789.659%2c649.365%2c809.533%2c613.841C828.826%2c579.356%2c840.223%2c537.847%2c820.238%2c503.758C800.427%2c469.965%2c758.72%2c459.938%2c719.55%2c460.354C681.257%2c460.761%2c641.302%2c472.496%2c622.501%2c505.858C603.959%2c538.76%2c616.642%2c577.707%2c634.731%2c610.86C653.866%2c645.931%2c679.605%2c683.051%2c719.55%2c683.732' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M119.19 629.04 a183.1 183.1 0 1 0 366.2 0 a183.1 183.1 0 1 0 -366.2 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M-32.16 53.43 a241.73 241.73 0 1 0 483.46 0 a241.73 241.73 0 1 0 -483.46 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1377.02 307.76 a244.78 244.78 0 1 0 489.56 0 a244.78 244.78 0 1 0 -489.56 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1409.566%2c129.496C1441.889%2c127.555%2c1471.645%2c112.87%2c1488.733%2c85.365C1506.885%2c56.148%2c1513.798%2c19.197%2c1496.601%2c-10.592C1479.403%2c-40.383%2c1443.943%2c-50.536%2c1409.566%2c-51.772C1372.27%2c-53.113%2c1331.531%2c-48.412%2c1310.968%2c-17.268C1288.675%2c16.497%2c1289.451%2c62.393%2c1312.014%2c95.979C1332.565%2c126.569%2c1372.78%2c131.705%2c1409.566%2c129.496' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1233'%3e%3crect width='1980' height='800' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='14.9%25' y1='-36.87%25' x2='85.1%25' y2='136.88%25' gradientUnits='userSpaceOnUse' id='SvgjsLinearGradient1234'%3e%3cstop stop-color='%230e2a47' offset='0'%3e%3c/stop%3e%3cstop stop-color='rgba(49%2c 42%2c 123%2c 1)' offset='1'%3e%3c/stop%3e%3c/linearGradient%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");

        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            /* box-shadow: 0 0 40px rgba(8,7,16,0.6); */
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
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

        ::placeholder {
            color: #e5e5e5;
        }

        #lgbtn {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login">
        <form action="" method="POST">
            <h1 style="text-align: center;">Admin Login</h1>
            <div style="text-align: center; color: #ffffff;">
                <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if (isset($_SESSION['loginerror'])) {
                    echo $_SESSION['loginerror'];
                    unset($_SESSION['loginerror']);
                }
                ?>
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Enter your Username">
            </div>
            <br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <br>
            <input type="submit" value="Login" name="submit" class="btn-primary" id="lgbtn">
            <h5 style="text-align:center;">All Rights Reserved. Designed by <a href="https://rutu-raj-portfolio.netlify.app">Ruturaj</a></h5>
        </form>

    </div>
</body>

</html>
<?php


?>
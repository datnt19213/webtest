<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Signup</title>
    <link rel="stylesheet" href="css/LoginSignup.css">
    <script src="js/LoginSignup.js" type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
        <div class="lg-su-form">
            <div id="border-radio">
                <div class="lg-rd">
                    <input type="radio" name="lg-su" ac onclick="showHide(0)" value="log" checked class="invisible-su" id="change-form">
                    <p class="cont">Login</p>
                </div>
                <div class="su-rd">
                    <input type="radio" name="lg-su" onclick="showHide(1)" value="sup" class="show-su" id="change-form">
                    <p class="cont">Sign up</p>
                </div>
            </div>


            <?php
                include_once("connect.php");
                if(isset($_POST['sign-up-btn'])){
                    $us = $_POST['txtid'];
                    $pass1 = $_POST['txtpass'];
                    $pass2 = $_POST['txtcfpass'];
                    $address = $_POST['txtaddress'];
                    $gen = $_POST['gender'];
                    $name = $_POST['txtname'];
                    $email = $_POST['txtemail'];
                    $phone = $_POST['txtphone'];

                    $fmUsername = "/^[A-Za-z0-9_\.]{6,32}$/";
                    $fmPass = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";

                    $err6 = "";

                    if($us == "" || $pass1 == "" || $pass2 == "" || $fullname == "" || $email == ""){
                            $err6.= "<b style=\"color: red; margin-left: 10px;\">Enter fields with mark (*), please</b><br/>";
                        }
                    if(!preg_match($fmUsername, $us)){
                        $err6.= "<b style=\"color: red; margin-left: 10px;\">Username must be greater than 5 characters include at least the format of letters and numbers</b><br/>";
                    }
                    if(!preg_match($fmPass, $pass1)){
                        $err6.= "<b style=\"color: red; margin-left: 10px;\">Password must have the first character is uppercase, lowercase, numbers and special characters</b><br/>";
                    }
                    if($pass1 != $pass2){
                        $err6 .= "<b style=\"color: red; margin-left: 10px;\">Password and confirm password are the same</b><br/>";
                    }
                    if($gen == "Male"){
                        $gen = "Male";
                    }
                    if($gen == "Female"){
                        $gen = "Female";
                    }
                    if($gen == ""){
                        $err6.="<b style=\"color: red; margin-left: 10px;\">Please choose the gender</b>";
                    }
                    if($err6 != ""){
                        echo "<b style=\"color: red; margin-left: 10px;\">".$err6."</b>";
                    }
                    else{
                        
                        $pass = md5($pass1);
                        $sq1 = "SELECT * FROM public.customer WHERE userId='$us' or email='$email'";
                        $ress = pg_query($con, $sq1);
                        
                        if(pg_num_rows($ress)==0){
                            pg_query($con, "INSERT INTO public.customer (userId, userName, gender, address, phone, pass, email) VALUES ('$us', '$name', '$gen', '$address', '$phone', '$pass1', '$email')");
                            echo "<script> alert(\"You have register successfully\"); </script>";
                        }
                        else{
                            echo "<b style=\"color: red; margin-left: 10px;\">Username or Email already exists</b><br/>";
                        }
                    }
                }
            ?>


            <div id="signup" class="signup">
                <h1 style="text-align: left; margin-bottom: 20px;">Sign up</h1>
                <ul class="lg-list">
                    <li class="lg-info">
                        <p>Username:</p>
                        <input type="text" name="txtid" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <p>Full Name:</p>
                        <input type="text" name="txtname" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <p>Gender:</p>
                        <input type="radio" value="Male" name="gender" class="lg-input-radio">Male
                        <input type="radio" value="Female" name="gender" class="lg-input-radio">Female
                    </li>
                    <li class="lg-info">
                        <p>Address:</p>
                        <input type="text" name="txtaddress" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <p>Email:</p>
                        <input type="email" name="txtemail" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <p>Phone:</p>
                        <input type="number" name="txtphone" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <p>Password:</p>
                        <input type="password" name="txtpass" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <p>Confirm Password:</p>
                        <input type="password" name="txtcfpass" class="lg-input">
                    </li>
                    <li class="lg-info">
                        <input type="checkbox" class="checkbtn" name="checkbox" id=""> Agree about the <a class="txt" href="" style="color:mediumblue;">policy statement</a>
                    </li>
                    <button class="lg-info su-btn" name="sign-up-btn">Sign up</button>
                </ul>
            </div>

            <?php
                if(isset($_POST['log-btn']))
                {
                    $us = $_POST['username'];
                    $pa = $_POST['pass'];

                    $err = "";
                    if($us == ""){
                        $err .= "<b style=\"color: red; margin-left: 10px;\">Enter Username, please!</b> <br/>";
                    }
                    if($pa == ""){
                        $err .= "<b style=\"color: red; margin-left: 10px;\">Enter Password, please!</b>";
                    }
                    if($err != ""){
                        echo $err;
                    }
                    else{
                        include_once("connect.php");
                        $pass = md5($pa);
                        $res = pg_query($con, "SELECT userId, pass FROM public.customer WHERE userId='$us' AND pass='$pass'");
                        // $res = pg_query($con, "SELECT status FROM public.customer WHERE userId='$us' AND pass='$pass'");
                        if(!$res){echo "error ($con)";}

                        $ad = pg_query($con, "SELECT AdminName, Admin_Password FROM admin_account WHERE AdminName = '$us' and Admin_Password = '$pa'");
                        if(!$ad){echo "error ($conn)";}

                        if(pg_num_rows($res)==1)
                        {
                            $usCheck = pg_fetch_assoc($res);
                            echo "<script> alert(\"Login has success!\"); </script>";
                            $_SESSION['us']=$us;
                            echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
                        }
                        elseif(pg_num_rows($ad)==1)
                        {
                            $adCheck = pg_fetch_assoc($ad);
                            echo "<script> alert(\"Login has success!\"); </script>";
                            $_SESSION['ad']= "Admin " .$us;
                            echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
                        }
                        else{
                            echo "<b style=\"color: red; margin-left: 10px;\">You logged is fail!</b>";
                        }
                    }
                }
            ?>

            <div id="login" class="login">
                <h1 style="text-align: left; margin-bottom: 20px;">Login</h1>
                <ul class="su-list">
                    <li class="su-info">
                        <p>Username:</p>
                        <input type="text" name="username" placeholder="Username" class="su-input">
                    </li>
                    <li class="su-info">
                        <p>Password:</p>
                        <input type="password" name="pass" placeholder="Password" class="su-input">
                    </li>
                    <li class="su-info">
                        <input type="checkbox" class="checkbtn" name="" id=""> Agree about the <a class="txt" href="" style="color:mediumblue;">policy statement</a>
                    </li>
                    <button class="su-info btn-log" name="log-btn">Login</button>
                </ul>
            </div>
        </div>
    </div>
</body>


</html>
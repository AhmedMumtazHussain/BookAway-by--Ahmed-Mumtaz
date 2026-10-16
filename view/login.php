<?php
require_once '../includes/config_session.inc.php';
if(isset($_SESSION['user_id']))
{
    header("Location: profile.php");
    die();
} 
require_once '../includes/signup_view.inc.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="loginbody">

        <video src="img/waterbackground.mp4" autoplay muted loop class="bv"></video>

    <section id="headerlog">
        <a href="#"><img src="img/logo.png" width="270px" height="180px" class="logo" alt="logo"></a>

        <div>
            <ul id="navbarlog">
                <li><a href="index.php">Home</a></li>
                <li><a href="locations.php">Locations</a></li>
                <li><a class="active" href="<?php if(isset($_SESSION['user_id'])){echo 'profile.php';} else{echo 'login.php';}?>"><i class="fa-regular fa-user" style="font-size: 18px;"></i></a></li>
                <li><a href="booking.php"><i class="fa-solid fa-hotel"></i></a></li>
                <li><a href="founders.php"><i class="fa-solid fa-code"></i></a></li>
            </ul>
        </div>
    </section>

        <section class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>
                <form action="../includes/login.inc.php" method="post">
                    <div class="input-box">
                        <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock" style="width: 16px;"></i></span>
                        <input type="password" name="pwd" required>
                        <label>Password</label>
                    </div>
                    <!-- <div class="remember-forgot">
                        <label ><input type="checkbox">&nbsp; Remember Me</label>
                        <a href="#">Forgot Password?</a>
                    </div> -->
                    <button type="submit" class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account?</p>
                        <a href="#" class="registration-link">Register</a>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <h2>Registration</h2>
                <form action="../includes/signup.inc.php" method="post">

                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock" style="width: 16px;"></i></span>
                        <input type="password" name="pwd" required>
                        <label>Password</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-phone" style="width: 16px;"></i></span>
                        <input type="number" name="phoneno" required>
                        <label>Phone No</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-location-crosshairs" style="width: 16px;"></i></span>
                        <input type="text" name="locations" required>
                        <label>Location</label>
                    </div>

                    <div class="remember-forgot">
                        <label ><input type="checkbox" required>&nbsp;I agree to the terms & conditions</label>
                    </div>
                    <button type="submit" class="btn">Register</button>
                    <div class="login-register">
                        <p>Already have an account?</p>
                        <a href="#" class="login-link">Login</a>
                    </div>
                </form>
            </div>
        </section>
        <div class="errorcontainer">
            <?php 
            check_signup_errors();
            logout_successful_msg();
            logintobook();
            logintounbook();            
            ?>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
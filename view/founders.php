<?php
require_once '../includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookAway</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- header -->

    <section id="header">
        <a href="#"><img src="img/logo.png" width="270px" height="180px" class="logo" alt="logo"></a>

        <div>
            <ul id="navbar">
                <li><a  href="index.php">Home</a></li>
                <li><a href="locations.php">Locations</a></li>
                <li><a href="<?php if(isset($_SESSION['user_id'])){echo 'profile.php';} else{echo 'login.php';}?>"><i class="fa-regular fa-user" style="font-size: 20px;"></i></a></li>
                <li><a href="booking.php"><i class="fa-solid fa-hotel"></i></a></li>
                <li><a class="active" href="founders.php"><i class="fa-solid fa-code"></i></a></li>
            </ul>
        </div>
    </section>

    <section class=foundercontainer>
        <div class="aprofile-card">
            <img src="img/person1.jpeg" alt="Profile Picture">
            <h2>Syed ZiaUddin Husaini</h2>
            <p class="title">Developer</p>

            <div class="info">
                <span>Course: Bachelor of Engineering (BE)</span>
                <span>Section: CSE 'A'</span>
                <span>Roll Number: 1603 22 73 30 <strong>51</strong></span>
            </div>
        </div>
        <div class="aprofile-card">
            <img src="img/person2.jpg" alt="Profile Picture">
            <h2>Ahmed Mumtaz</h2>
            <p class="title">Curator</p>

            <div class="info">
                <span>Course: Bachelor of Engineering (BE)</span>
                <span>Section: CSE 'A'</span>
                <span>Roll Number: 1603 22 73 30 <strong>52</strong></span>
            </div>
        </div>
        <div class="aprofile-card">
            <img src="img/person3.jpg" alt="Profile Picture">
            <h2>Abdullah Ahmed</h2>
            <p class="title">Curator</p>

            <div class="info">
                <span>Course: Bachelor of Engineering (BE)</span>
                <span>Section: CSE 'A'</span>
                <span>Roll Number: 1603 22 73 30 <strong>47</strong></span>
            </div>
        </div>
    </section>

    <!-- footer -->

    <footer class="sectoin-p1">
        <img src="img/logo.png" width="290px" height="220px" class="logo" alt="logo">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address: </strong> abc def ghi jkl mno pqr stu vwx yz</p>
            <p><strong>contact no:</strong>+91 &nbsp 1234567890</p>
            <p><strong>Hours: </strong> .....10:00  -  18:00 , Mon -  Sat</p>
            
            <div class="follow">
                <h4>Follow Us</h4>
                <div>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <p>About us</p>
            <p>Delivary Information</p>
            <p>Privacy Policy</p>
            <p>Terms & Conditions</p>
            <p>Contact Us</p>
        </div>
    </footer>

</body>
</html>
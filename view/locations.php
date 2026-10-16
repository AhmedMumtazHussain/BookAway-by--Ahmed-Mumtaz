<?php
require_once '../includes/config_session.inc.php';
include_once '../bookincludes/locations_view.inc.php';
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
<body class="locationpg">

    <!-- header -->

    <section id="header">
        <a href="#"><img src="img/logo.png" width="270px" height="180px" class="logo" alt="logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="locations.php">Locations</a></li>
                <li><a href="<?php if(isset($_SESSION['user_id'])){echo 'profile.php';} else{echo 'login.php';}?>"><i class="fa-regular fa-user" style="font-size: 20px;"></i></a></li>
                <li><a href="booking.php"><i class="fa-solid fa-hotel"></i></a></li>
                <li><a href="founders.php"><i class="fa-solid fa-code"></i></a></li>
            </ul>
        </div>
    </section>

     <!-- banner -->

    <section class="banner">
        <h2>#Locations</h2>
        <img src="img/banner.png" alt="hero">
    </section>

    <!-- sidebar avail -->

    <section class="sidebar">
        <div id="avalformboxholder">
            <h3>Check Booking Avalability</h3>
            <div class="from-cont">
                <form action="locations.php" class="form1" id="aval" method="post">
                    <div class="dateinputbox">
                        <label>CheckIn Date:</label>
                        <input type="date" name="checkin" min="1997-01-01" max="2030-12-31">
                    </div>
                    <div class="dateinputbox">
                        <label>CheckOut Date:</label>
                        <input type="date" name="checkout"  min="1997-01-01" max="2030-12-31">
                    </div>
                    <div class="selector">
                        <label>Chose Season:</label>
                        <select name="season">
                            <option value= "null" selected></option>
                            <option value="Summer">Summer</option>
                            <option value="Winter">Winter</option>
                            <option value="Autumn">Autumn</option>
                        </select>
                    </div>
                    <div class="selector">
                        <label>Have Child:</label>
                        <select name="child">
                            <option value= "null" selected></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="submit-button">
                        <button type="submit" class="submit-butt">Submit / Clear Filters</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- locatoins -->

    <section id="locpre" class="sectoin-p1">
        <h2>Destinations</h2>
        <p></p>
        <div class="locon">
            <?php display_locations($result);?>
        </div>
    </section>

    <!-- footers -->

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
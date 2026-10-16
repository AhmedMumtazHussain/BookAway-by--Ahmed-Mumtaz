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
    <!-- <link rel="icon" type="image/x-icon" href="img/logo2.png"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- header -->

    <section id="header">
        <a href="#"><img src="img/logo.png" width="270px" height="180px" class="logo" alt="logo"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="locations.php">Locations</a></li>
                <li><a href="<?php if(isset($_SESSION['user_id'])){echo 'profile.php';} else{echo 'login.php';}?>"><i class="fa-regular fa-user" style="font-size: 20px;"></i></a></li>
                <li><a href="booking.php"><i class="fa-solid fa-hotel"></i></a></li>
                <li><a href="founders.php"><i class="fa-solid fa-code"></i></a></li>
            </ul>
        </div>
    </section>

    <!-- hero -->

    <section id="hero">
        <h4>Visit-Now</h4>
        <h2>Super value deals</h2>
        <h1>On wonderfull Destinations</h1>
        <p>Save more with upto 30% off!</p>
        <a href="locations.php"><button>See locations</button></a>
    </section>

    <!-- avalability from

    <section class="aval-form">
        <h3>Check Booking Avalability</h3>
        <div class="from-cont">
            <form action="#" class="form1" id="aval">
                <div class="dateinputbox">
                    <label>CheckIn Date:</label>
                    <input type="date" name="" value="" min="1997-01-01" max="2030-12-31" required>
                </div>
                <div class="dateinputbox">
                    <label>CheckOut Date:</label>
                    <input type="date" name="" value="" min="1997-01-01" max="2030-12-31" required>
                </div>
                <div class="selector">
                    <label>Season</label>
                    <select>
                        <option selected>Seasons:</option>
                        <option value="1">Summer</option>
                        <option value="2">Winter</option>
                        <option value="3">Autom</option>
                    </select>
                </div>
                <div class="selector">
                    <label>Child</label>
                    <select>
                        <option selected>Have Children:</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="submit-button">
                    <button type="submit" class="submit-butt">Submit</button>
                </div>
            </form>
        </div>
    </section> -->

    <!-- feature heading -->

    <section id="featureh">
        <h1 >Features</h1>
    </section>

    <!-- features -->

    <section id="feature" class="sectoin-p1">

        <div class="fe-box">
            <img src="img/features/f1.png" width="160px" height="90px">
            <h6>Online_Booking</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" width="160px" height="90px">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" width="160px" height="90px">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" width="160px" height="90px">
            <h6>Happy Travel</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" width="160px" height="90px">
            <h6>24/7 Support</h6>
        </div>
    </section>

    <!-- featured locations -->
    
    <section id="locpre" class="sectoin-p1">
        <h2>Featured Destinations</h2>
        <p>Winter comfort</p>
        <div class="locon">
            <div class="loc">
                <img src="img/locations/winter/loc1/0.avif" alt="">
                <div class="des">
                    <span>Winter</span>
                    <h4>Modern Tiny Cabin, Home in Choteau, Montana, United States</h4>
                    <h6>4 guests, 1 bedroom, 2 beds, 1 bathroom, Hot tub</h6>
                    <h5>₹ 21,261 per night</h5> 
                    <a href="detail.php?id=1" ><i id="arrow" class="fa-solid fa-arrow-right"></i></a>
                </div>    
            </div>
            <div class="loc">
                <img src="img/locations/summer/loc1/0.avif" alt="">
                <div class="des">
                    <span>Summer</span>
                    <h4> Quinta da Santana- Luxury Country Poolside Villa, Entire villa in Margao, India</h4>
                    <h6>2 guests, 1 bedroom, 1 bed, 1 bathroom, Kitchen, Shared pool, Wifi</h6>
                    <h5>₹ 6,182 per night</h5> 
                    <a href="detail.php?id=2" ><i id="arrow" class="fa-solid fa-arrow-right"></i></a>
                </div>    
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
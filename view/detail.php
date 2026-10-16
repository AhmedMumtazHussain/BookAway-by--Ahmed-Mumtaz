<?php
require_once '../includes/config_session.inc.php';
require_once '../bookincludes/details.inc.php';
require_once '../bookincludes/detail_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookAway</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
    

</head>
<body>

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

    <?php emptyInput();
    datetaken();
    bookedmsg();
    ?>

    <!-- detailbody -->

    <secion class="closebutton">
        <button class="dclosebtn" onclick="location.replace('locations.php');">x</button>
    </secion>

    <section class="detialmain">
        <div class="detialcontainer">
            <?php display_details($result, $result['id']) ?>
        </div>
    </section>

    <section class="bookform">

    </section>

    <section class="description">
        <h3>Discription</h3>
        <?php display_discription($result)?>
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
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
          effect: "cube",
          grabCursor: true,
          cubeEffect: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
          },
          pagination: {
            el: ".swiper-pagination",
          },
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script>
        const hotelId = <?php echo $hid ?> ;
        

        fetch(`../bookincludes/fetchUnavailableDates.php?hid=${hotelId}`)
            .then(response => response.json())
            .then(data =>   {
                                const unavalabledates = data;
                                    // Initialize the check-in date picker
                                const checkinPicker = flatpickr("#checkin", {
                                    dateFormat: "Y-m-d", // Format for the date
                                    minDate: new Date(), // Set today's date as the minimum
                                    disable: unavalabledates,
                                    onChange: function(selectedDates) {
                                        // When the check-in date is selected, set the check-out's minDate
                                        if (selectedDates.length > 0) {
                                            const selectedDate = new Date(selectedDates[0]);
                                            selectedDate.setDate(selectedDate.getDate() ); // Add one day for checkout
                                            checkoutPicker.set("minDate", selectedDate); // Update the minDate for checkout
                                            checkoutPicker.set("value", null); 
                                        }
                                        updatePrice();
                                    }
                                });

                                // Initialize the check-out date picker
                                const checkoutPicker = flatpickr("#checkout", {
                                dateFormat: "Y-m-d",
                                minDate: new Date(), // Initial minDate is today
                                disable: unavalabledates,
                                onChange: updatePrice
                                });
                                function updatePrice()
                                {
                                    const checkinDate = checkinPicker.selectedDates[0];
                                    const checkoutDate = checkoutPicker.selectedDates[0];
                                    const pricedisplay = document.getElementById('totalp');

                                    if (checkinDate && checkoutDate) {
                                        // Calculate the difference in days
                                        const timeDifference = checkoutDate - checkinDate + 2; // Difference in milliseconds
                                        const numDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24)); // Convert to days

                                        if (numDays > 0) {
                                            // Calculate the total price
                                            const totalPrice = numDays * <?php echo $result['price'] ?>;

                                            // Display the price
                                            

                                            pricedisplay.textContent = `Total price for ${numDays} day is ₹ ${totalPrice}`;
                                            pricedisplay.style.display = "block";
                                        } 
                                    }
                                    else {
                                            pricedisplay.textContent = ``;
                                            pricedisplay.style.display = "none";
                                        }
                                }   
                                    
                            });
            

        
  </script>
</body>
</html>
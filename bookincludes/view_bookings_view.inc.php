<?php

function display_bookings($result)
{
    if(isset($result) && !empty($result))
    {
        
        foreach($result as $resultsingle)
        {
            $images = explode(',',$resultsingle['hotel_images']);
        echo '<div class="bookings">
        <div class="bimage">
            <img src="'. $images[0].'" alt="Bookingimage">
        </div>
        <div class="discription">
            <div class="discript">
                <h4>'. $resultsingle['hname'] .'</h4>
            </div>
            <div class="startdate">
                <h4>Check In Date: '. $resultsingle['checkin'] .' </h4>
            </div>
            <div class="enddate">
                <h4>Check Out Date: '. $resultsingle['checkout'] .' </h4>
            </div>
            <div class="price">
                ₹ '. $resultsingle['price'] .' per night
            </div>
            <div class="totalprice">
                Price for <strong>'. $resultsingle['days'] .'</strong> Days is <strong>₹ '. $resultsingle['total'] .'</strong>
            </div>
            <form action="../bookincludes/deleteBooking.inc.php" method="POST" onsubmit="return confirm (\'Are you sure you want to delete this booking?\');">
                            <input type="hidden" name="bookingid" value="'. $resultsingle['bid'] .'">
                            <button type="submit" class="btn">Un Book</button>
                        </form>

            </div>
            </div>';
        }
    } else
    {
        echo "<h3>No Bookings Found , Please Make a Booking !!</h3>";
    }
}

function invalidunbook(){
    if(isset($_GET['invalidunbook']) && $_GET['invalidunbook'] === "truee"){
        echo '<br>';
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>Something went wrong during the unbooking process, invalid unbook!!</strong>
        </div>';
    }
}
function unbook(){
    if(isset($_GET['unbook']) && $_GET['unbook'] === "truee"){
        echo '<br>';
        echo '<div class="alert1">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>Un Booking Successful !!!</strong>
        </div>';
    }
}
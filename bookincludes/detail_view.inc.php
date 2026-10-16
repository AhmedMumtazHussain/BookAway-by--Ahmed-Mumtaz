<?php

function emptyInput()
{
    if(isset($_GET['inputempty']) && $_GET['inputempty'] === "truee"){
        echo '<br>';
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>CheckIn and CheckOut must not be empty !!</strong>
        </div>';
    }
}

function datetaken()
{
    if(isset($_GET['datetaken']) && $_GET['datetaken'] === "truee"){
        echo '<br>';
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>Hotel already book for some of those days , try making multiple bookings if needed !!</strong>
        </div>';
    }
}
function bookedmsg()
{
    if(isset($_GET['booked']) && $_GET['booked'] === "truee"){
        echo '<br>';
        echo '<div class="alert1">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>Booked Successfully !!!!</strong>
        </div>';
    }
}
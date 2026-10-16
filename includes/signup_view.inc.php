<?php

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        echo "<br>";
        foreach($errors as $error){
            echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
                <strong> '. $error .'</strong>
          </div>
          ';
        }
        unset($_SESSION["errors_signup"]);
    } else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<div class="alert1">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>Signup Success !!!</strong>
  </div>';
    }
}

function logout_successful_msg(){
    if(isset($_GET['logout']) && $_GET['logout'] === "success"){
        echo '<br>';
        echo '<div class="alert1">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>LogOut Success !!!</strong>
        </div>';
    }
}

function logintobook(){
    if(isset($_GET['logintobook']) && $_GET['logintobook'] === "truee"){
        echo '<br>';
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>You need to be logged in to make Bookings !!</strong>
        </div>';
    }
}
function logintounbook(){
    if(isset($_GET['logintounbook']) && $_GET['logintounbook'] === "truee"){
        echo '<br>';
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">x</span>
        <strong>Seems like to login session has expired , Please login again to unbook !!</strong>
        </div>';
    }
}
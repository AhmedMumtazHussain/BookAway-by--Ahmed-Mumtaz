<?php

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $hid = $_GET['id'];
    require_once 'dbh.inc.php';
    function get_details($pdo , $hid)
    {
        $query =    "SELECT hotels.*, GROUP_CONCAT(himages.iurl) AS images
                    FROM hotels
                    LEFT JOIN himages ON hotels.id = himages.hid WHERE hotels.id = :hid;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":hid",$hid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    $result = get_details($pdo, $hid);
    $pdo=null;
    $stmt=null;
    function display_details($result, $hid)
    {
        if($result && !empty($result))
        {
            // $currentdate = date('Y-m-d');
            $images = explode(',',$result['images']);
            echo    '<div class="carasaulimg">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">';
                            foreach($images as $image)
                            {
                                echo    '<div class="swiper-slide">
                                            <img src="'. $image .'" alt="imagealt" />
                                        </div>';
                            }
                    echo    '</div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="details">
                        <h6>'. $result['season'] .'</h6>
                        <h4>'. $result['hname'] .'</h4>
                        <h3>₹ ' . number_format($result['price']) . ' per night</h3>
                        <h5>Features:</h5>
                        <h6>'. $result['features'] .'</h6>
                    </div>
                    <form action="../bookincludes/validate_book.php" class="form1" id="aval" method="post">
                        <div class="dateinputbox">
                            <label>CheckIn Date:</label>
                            <input type="text" id="checkin" name="checkin">
                        </div>
                        <div class="dateinputbox">
                            <label>CheckOut Date:</label>
                            <input type="text" id="checkout" name="checkout">
                        </div>
                        <div>
                            <h3 id="totalp" style="display:none"></h3>
                        </div>
                        <div class="submit-button">
                            <button type="submit" class="btn">Book Now !</button>
                        </div>
                        <input type="hidden" name="hid" value="'. $hid .'">
                        </form>';
        }
    }
    function display_discription($result)
    {
        echo '<p>'. $result['discription'] .'</p>';
    }
} else {
    header("Location: locations.php");
    die();
}

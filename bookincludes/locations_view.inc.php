<?php

require_once 'locations.inc.php';

// var_dump($result);

function display_locations($result)
{
    if($result && !empty($result)) {
        foreach($result as $location)
        {
            $images = explode(',',$location['images']);
            echo    '<div class="loc">
                        <img src=" ' . $images[0] . '" alt="">
                            <div class="des">
                                <span>' . $location['season'] . '</span>
                                <h4> ' . $location['hname'] . '</h4>
                                <h6>' . $location['features'] . '</h6>
                                <h5>₹ ' . number_format($location['price']) . ' per night</h5> 
                                <a href="detail.php?id='. $location['id'] .'" ><i id="arrow" class="fa-solid fa-arrow-right"></i></a>
                            </div>    
                    </div>';    
        }
    } else {
        echo '<h3>No Results Found !!</h3>';
    }
}


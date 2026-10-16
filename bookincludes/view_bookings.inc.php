<?php 

if(!isset($_SESSION['user_id']))
{
    $result = null;
    
} else{

    require_once 'dbh.inc.php';

    $uid = $_SESSION['user_id'];

    $stmt = $pdo->prepare("SELECT bookings.* , hotels.hname, hotels.price , GROUP_CONCAT(himages.iurl ORDER BY himages.iurl) AS hotel_images
    FROM bookings 
    JOIN
    hotels ON bookings.hid = hotels.id
    LEFT JOIN
    himages ON hotels.id = himages.hid
    WHERE
    bookings.uid = :userid
    GROUP BY
    bookings.bid , hotels.id;");

    $stmt->execute(['userid' => $uid]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($result);

    if(empty($result))
    {
        $result = null;
    }

    $pdo = null;
    $stmt=null;

    
}

require_once '../bookincludes/view_bookings_view.inc.php';






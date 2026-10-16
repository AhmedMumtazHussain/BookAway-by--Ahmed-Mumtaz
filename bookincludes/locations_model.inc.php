<?php

function get_displayhotels($pdo , $checkin  , $checkout , $season , $child)
{
    $stmt = "SELECT hotels.*, GROUP_CONCAT(himages.iurl) AS images
            FROM hotels
            LEFT JOIN himages ON hotels.id = himages.hid";
    
    $filters = [];
    if(isset($checkin) && isset($checkout) && !empty($checkin) && !empty($checkout))
    {
        $filters[] =   "hotels.id NOT IN ( SELECT hid FROM bookings WHERE (bookings.checkin <= \"$checkout\" AND bookings.checkout >= \"$checkin\"))";
    }

    if(isset($season) && !empty($season) && $season != "null")
    {
        $filters[] = "hotels.season = '$season'";
    }

    if(isset($child) && !empty($child) && $child != "null")
    {
        $filters[] = "hotels.children = '$child'";
    }

    if(!empty($filters))
    {
        $stmt .= " WHERE " . implode(" AND ", $filters);
    }
    $stmt .= " GROUP BY hotels.id;";
    
    $query = $pdo->prepare($stmt);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = null;
    return $result;
}
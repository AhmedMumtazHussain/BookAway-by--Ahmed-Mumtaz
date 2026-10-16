<?php

require_once 'config_session.inc.php';
if(isset($_SESSION['user_id']))
{  
    $hotelid = (int)$_POST['hid'] ;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['checkin']) && !empty($_POST['checkout'])) {
        $checkin = $_POST['checkin'];
        $checkout= $_POST['checkout'];
        $uid = $_SESSION['user_id'];
        require_once 'dbh.inc.php';
        $stmt = $pdo->prepare("
            SELECT COUNT(*) FROM bookings WHERE hid = :hid AND (checkin <=  :checkout  AND checkout >=  :checkin );"
        );

        $stmt->bindParam(":hid",$hotelid);
        $stmt->bindParam(":checkin",$checkin);
        $stmt->bindParam(":checkout",$checkout);

        $stmt->execute();

        $count = $stmt->fetchColumn();

        if($count > 0)
        {
            $pdo = null;
            $stmt = null;
            header("Location: ../view/detail.php?id=$hotelid & datetaken=truee");
            die();
        }
        
        function calculateDaysInclusive($startDate, $endDate) {
            // Convert the dates to DateTime objects
            $start = new DateTime($startDate);
            $end = new DateTime($endDate);
        
            // Add 1 day to include the end date
            $end->modify('+1 day');
        
            // Calculate the difference between the dates
            $interval = $start->diff($end);
        
            // Return the total days
            return $interval->days;
        }

        $days = calculateDaysInclusive($checkin,$checkout);
        $stmt = $pdo->prepare("SELECT price FROM hotels WHERE id = :id");
        $stmt->execute(['id' => $hotelid]);
        $price = $stmt->fetchColumn();
        $total = ($days * $price);

        if(isset($_SESSION['user_id']))
        {
            $stmt = $pdo->prepare("
            INSERT INTO bookings (uid, hid, checkin, checkout, total, days)
            VALUES (:uid, :hid, :checkin, :checkout, :total, :days)");

            $stmt->execute([
                'uid' => $_SESSION['user_id'],
                'hid' => $hotelid,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'total' => $total,
                'days' => $days
            ]);

        } else
        {
            $pdo=null;
            $stmt=null;
            header("Location: ../view/login.php?logintobook=truee");
            die();
        }


        $pdo=null;
        $stmt=null;

        header("Location: ../view/detail.php?id=$hotelid &booked=truee");
        die();
        
    } else {
        header("Location: ../view/detail.php?id=$hotelid & inputempty=truee");
        die();
    }

} else {
    header("Location: ../view/login.php?logintobook=truee");
    die();
}
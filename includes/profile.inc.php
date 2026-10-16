<?php

if(isset($_SESSION['user_id']))
{
    require_once 'dbh.inc.php';
    function get_user_details(object $pdo)
    {
        $query = "SELECT * FROM users WHERE id = :userid;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userid",$_SESSION['user_id']);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;
        return $result;

    }
    
    $user_details = get_user_details($pdo);
    $username = $user_details['username'];
    $email = $user_details['email'];
    $phoneno = $user_details['phoneno'];
    $locations = $user_details['locations'];

    function display_details(string $username , string $email ,int $phoneno , string $locations)
    {
        echo    '<h2> '. $username .'</h2>
                <p>User</p>

                    <div class="details">
                        <div><span>Email:</span> &nbsp; '. $email .'</div>
                        <div><span>Phone:</span> &nbsp; '. $phoneno .'</div>
                        <div><span>Location:</span>&nbsp; '. $locations .'</div>
                    </div>';
        $user_details = null;
        $username = null;
        $email = null;
        $phoneno = null;
        $locations = null;
        
    } 
    $pdo = null;
    $stmt = null;
}
    $pdo = null;
    $stmt = null;
    



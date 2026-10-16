<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {

        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_view.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDELING

        $errors = [];

        if(is_input_empty($email , $pwd)){
            $errors["empty_input"] = "Fill in all Fields!!";
        }
        if(is_email_invalid( $email )){
            $errors["invalid_email"] = "Invalid email used!!";
        }

        $result = get_email($pdo, $email);

        if(is_email_wrong($result)){
            $errors["login_incorrent"] = "This email is not registered!!";
        }

        if(!is_email_wrong($result) && is_password_wrong($pwd , $result["pwd"])){
            $errors["login_incorrent"] = "Password might be incorrect";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;
            $pdo = null;
            $stmt= null;
            header("Location: ../view/login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        echo $sessionId;
        
        $pdo = null;
        $stmt = null;

        header("Location: ../view/profile.php?login=success");
        

        die();
    
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../view/index.php");
    die();
}
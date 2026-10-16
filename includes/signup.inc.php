<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim(htmlspecialchars(strip_tags($_POST["username"]), ENT_QUOTES, 'UTF-8'));
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $locations = trim(htmlspecialchars(strip_tags($_POST["locations"]), ENT_QUOTES, 'UTF-8'));

    try {
    
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_view.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDELING

        $errors = [];

        if(is_input_empty($username , $pwd , $email , $phoneno , $locations)){
            $errors["empty_input"] = "Fill in all Fields!!";
        }
        if(is_email_invalid( $email )){
            $errors["invalid_email"] = "Invalid email used!!";
        }
        if (is_username_taken($pdo ,$username )) {
            $errors["username_taken"] = "That users is already taken!";
        }
        if (is_email_registered($pdo ,$email )) {
            $errors["email_used"] = "Email already registered!!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;
            $pdo=null;
            $stmt=null;
            header("Location: ../view/login.php");
            die();
        }

        create_user( $pdo , $username, $email, $pwd, $phoneno, $locations);
        
        $pdo = null;
        $stmt = null;
        header("Location: ../view/login.php?signup=success");
        
        // session_destroy();
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../view/index.php");
    die();
}
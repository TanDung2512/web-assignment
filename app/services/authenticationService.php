<?php

require_once(__DIR__."/../database/connect_DB.php");
include_once(__DIR__."/../classes/user.php");

 /**
  * @package app\services
  * This class provides all authentication functions.
  *
  * @method null | boolean signin(string $user_mail_in, string $password_in)
  * @method null signout()
  */

class AuthenService {

 /**
  * @var connectDB $db_connection 
  */   
    private $db_connection;

    public function __construct() {
        $this->db_connection = connectDB::getInstance()->getConnection();

        // check if session exists
        if (isset($_COOKIE['loggedin']) AND $_COOKIE['user'] == $_SESSION['user_ID']) {
            setcookie('user', $_SESSION['user_ID'], time() + 10); // to be changed to 3600 
        } else {
            session_unset();
            session_destroy();
        }
    }

/**
  * signin function
  * @param string $user_mail_in
  * @param string $password_in
  *
  * @return null | false
  */  

    public function signin($user_mail_in, $password_in) {
        session_start();

        // if no data submitted, return false
        if ($user_mail_in == '' || $password_in == '' || $user_mail_in == null || $password_in == null) {
            return false;
        }

        $query = 'SELECT user_ID, user_mail, password, avatar FROM users WHERE user_mail = ?';

        // Prepre SQL to prevent SQL injection
        if ($stmt = $this->db_connection->prepare($query)) {
            $stmt->bind_param('s', $user_mail_in);
            $stmt->execute();

            // Store result to check if email exists in DB
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_ID, $user_mail, $password, $avatar);
                $stmt->fetch();

                // use password_hash in login file
                // Email exists, check password
                if (password_verify($password_in, $password)) {

                    // add SESSION
                    session_regenerate_id();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_ID'] = $user_ID;
                    $_SESSION['avatar_url'] = $avatar;
                    $_SESSION['hash_token'] = password_hash($user_ID . $password);
                    
                    // time to be changed to 3600; 10 for testing
                    setcookie("user", $_SESSION['user_ID'], time() + 10);
                    // header("location: "); echo for testing
                    echo "Logged in";
                } else {
                    echo "Wrong password";
                }
            } else {
                echo "Wrong email";
            }
            $stmt->close();
        }
    }

/**
  * logout function
  * 
  * @return null
  */      

    public function signout() {
        session_start(); 
        session_unset();
        session_destroy();
        setcookie("user", "", time() - 3600);
        // header("location": ...);

        return null;
    }
}

?>
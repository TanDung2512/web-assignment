<?php

require_once(__DIR__."/../database/connect_DB.php");
require_once(__DIR__."/userService.php");
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
    private $userService;

    public function __construct() {
        $this->db_connection = connectDB::getInstance()->getConnection();
        $this->userService = new UserService();

        // check if session exists
        if (isset($_SESSION['user_ID'])) {
            setcookie('user_ID', $_SESSION['user_ID'], time() + TIMEOUT); // to be changed to 3600 
            setcookie('token', $_SESSION['hash_token'], time() + TIMEOUT);
        } else {
            if (isset($_COOKIE['user_ID'])) {

                $cookieToken = $this->getTokenFromCookie($_COOKIE['user_ID']);

                if ($cookieToken == $_COOKIE['token']) {

                    $_SESSION['user_ID'] = $_COOKIE['user_ID'];
                    $user = $this->userService->getUserByID($_COOKIE['user_ID']);
                    $pw = $user->get("password");
                    $_SESSION['hash_token'] = password_hash($_COOKIE["user_ID"] . $pw);    

                    setcookie('user_ID', $_SESSION['user_ID'], time() + TIMEOUT); // to be changed to 3600 
                    setcookie('token', $_SESSION['hash_token'], time() + TIMEOUT);
                }
            }
        }
    }

/**
  * return token from user ID
  * @param string $user_ID
  *
  * @return string $cookie_hash | false
  */  

    public function getTokenFromCookie($user_ID) {
        $user_db = $this->userService->getUserByID($user_ID);
        if ($user_db) {
            $cookie_hash = password_hash($user_db->get("user_ID") . $user_db->get("password"));
            return $cookie_hash;
        } else {
            return false;
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

        // if no data submitted, return false
        if ($user_mail_in == '' || $password_in == '' || $user_mail_in == null || $password_in == null) {
            return false;
        }
        $query = 'SELECT user_ID, user_mail, password FROM users WHERE user_mail = :user_mail';

        // Prepre SQL to prevent SQL injection
        if ($stmt = $this->db_connection->prepare($query)) {
            $stmt->bindParam(':user_mail', $user_mail_in, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();

            // Store result to check if email exists in DB
            // $stmt->store_result();

            if (count($row) > 0) {
                // use password_hash in login file
                // Email exists, check password
                if (password_verify($password_in, $row["password"])) {

                    // add SESSION
                    $_SESSION['user_ID'] = $row["user_ID"];
                    $_SESSION['user_mail'] = $row["user_mail"];
                    $_SESSION['hash_token'] = password_hash($row["user_ID"] . $row["password"], PASSWORD_DEFAULT);
                    
                    // time to be changed to 3600; 10 for testing
                    setcookie("user_ID", $_SESSION['user_ID'], time() + 10);
                    setcookie("token", $_SESSION['hash_token'], time() + 10);
                    // header("location: "); echo for testing
                    return true;
                } else {
                    $_SESSION['error'] = 'Wrong password';
                    return false;
                }
            } else {
                $_SESSION['error'] = 'Wrong email';
                return false;
            }
        }
    }

/**
  * logout function
  * 
  * @return null
  */      

    public function signout() {
        session_unset();
        session_destroy();
        setcookie("user_ID", "", time() - 3600);
        // header("location": ...);

        return null;
    }

/**
  * sign up function
  * 
  * @param string $mail_in
  * @param string $pw_in
  * @param string $pw_confirm_in
  *
  * @return boolean
  */    

    public function signup($mail_in, $pw_in, $pw_confirm_in) {
        if ($mail_in == null || $pw_in == null || $pw_confirm_in == null ||
            trim($mail_in) == '' || trim($pw_in) == '' || trim($pw_confirm_in) == '') {
            return false;
        }

        if ($pw_in != $pw_confirm_in) {
            $_SESSION['error'] = 'Password don\'t match';
            echo "Pw doesnt match pw confirm";
            return false;
        }

        // default role
        $user_role = "user";

        $create_user_success = $this->userService->createUser($mail_in, $pw_in, $user_role);
        if ($create_user_success) {
            $sign_in_success = $this->signin($mail_in, $pw_in);
            if ($sign_in_success) {
                return true;
            }
        } else {
            $_SESSION['error'] = 'Failed to sign in';
            echo "failed to sign in";
            return false;
        }
    }
}

?>
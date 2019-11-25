<?php

/**
 * User service
 */

require_once(__DIR__."/../database/connect_DB.php");
include_once(__DIR__."/../classes/user.php");

class Users {
  public function __construct() {
    try {
      $db = DB::getInstance();
    } catch (Exception $e) {
      print $e->getMessage();
      exit();
    }
  }
/**
  * create new user
  * @param string $user_ID
  * @param string $user_mail
  * @param string $password
  * @param string $avatar
  * @param string $role
  * @param string $gender 
  * @param string $birthday
  *
  * @return null
  */  
  public function creatUser($user_ID, $user_mail, $password, $avatar, $role, $gender, $birthday) {
    $query = 'INSERT INTO users (user_ID, user_mail, password, avatar, role, gender, birthday)  
                            VALUES(:user_ID, :user_mail, :password, :avatar, :role, :gender, :birthday)';
    $stmt = $this->getConnection()->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID);
    $stmt->bindParam(':user_mail', $user_mail);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->execute();
  }

/**
  * get user by user ID
  * @param string $user_ID
  *
  * @return array key: value
  */  
  public function getUserByID($user_ID) {
    $query = 'SELECT * FROM users WHERE user_ID = :user_ID';
    $stmt = $this->getConnection()->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll(); 
  }

  /**
  * get user by user mail
  * @param string $user_mail
  *
  * @return array key: value
  */
  public function getUserByEmail($user_mail) {
    $query = 'SELECT * FROM users WHERE user_mail = :user_mail';
    $stmt = $this->getConnection()->prepare($query);
    $stmt->bindParam(':user_mail', $user_mail);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();    
  }

  /**
  * update user role by user ID
  * @param string $user_ID
  * @param string $role
  *
  * @return null
  */  
  public function updateRoleByID($user_ID, $role) {
    $query = "UPDATE user SET role = :role WHERE user_iD = :user_ID";
    $stmt = $this->getConnection()->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
  }

  /**
  * get user role by user ID
  * @param string $user_ID
  *
  * @return array role: value
  */  
  public function getRoleByID($user_ID) {
    $query = 'SELECT role FROM users WHERE user_ID = :user_ID';
    $stmt = $this->getConnection()->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt->fetchAll();  
  }
}
?>
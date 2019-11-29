<?php

require_once(__DIR__."/../database/connect_DB.php");
include_once(__DIR__."/../classes/user.php");

 /**
  * @package app\services
  * This class provides all user-relating functions.
  *
  * @method boolean createUser()
  * @method User|boolean getUserByID(integer $user_ID)
  * @method User|boolean getUserByEmail(string $user_mail)
  * @method User|boolean updateRoleByID(string $user_ID)
  * @method array|boolean getRoleByID(string $user_ID)
  */
class UserService{

 /**
  * @var connectDB $db_connection 
  */   
  private $db_connection;

  public function __construct() {
      $this->db_connection = connectDB::getInstance()->getConnection();
  }
/**
  * create new user
  * @param int $user_ID
  * @param string $user_mail
  * @param string $password
  * @param string $avatar
  * @param string $role
  * @param string $gender 
  * @param string $birthday
  *
  * @return boolean
  */  
  public function createUser(
    string $user_mail, 
    string $password, 
    string $role
  ){
    $query = 'INSERT INTO users (user_mail, password, role)  
              VALUES (:user_mail, :password, :role)';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_mail', $user_mail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    return $stmt->execute();
  }

  /**
    * get user by user ID
    * @param string $user_ID
    *
    * @return User|false
    */  
  public function getUserByID($user_ID) {
    if($user_ID == NULL){
      return false;
    }
    $query = 'SELECT * FROM users WHERE user_ID = :user_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll(); 
    if (count($resultSet) == 1) {
      $user_db = $resultSet[0];
      $user = new User($user_db["user_ID"], $user_db["user_mail"], $user_db["password"], $user_db["role"]);
      return $user;
    }
    return false;
  }

  /**
  * get user by user mail
  * @param string $user_mail
  *
  * @return User|false
  */
  public function getUserByEmail($user_mail) {
    if($user_mail == NULL){
      return false;
    }
    $query = 'SELECT * FROM users WHERE user_mail = :user_mail';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_mail', $user_mail, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll(); 
    if (count($resultSet) == 1) {
      $user_db = $resultSet[0];
      $user = new User($user_db["user_ID"], $user_db["user_mail"], $user_db["password"], $user_db["avatar"], $user_db["role"], $user_db["gender"], $user_db["birthday"]);
      return $user;
    }
    return false;  
  }

  /**
  * update user role by user ID
  * @param int $user_ID
  * @param string $role
  *
  * @return boolean
  */  
  public function updateRoleByID($user_ID, $role) {
    if($user_ID == NULL || $role == NULL){
      return false;
    }
    $query = "UPDATE users SET role = :role WHERE user_ID = :user_ID";
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID, PDO::PARAM_INT);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    return $stmt->execute();
  }

  /**
  * get user role by user ID
  * @param string $user_ID
  *
  * @return string|boolean
  */  
  public function getRoleByID($user_ID) {
    $query = 'SELECT role FROM users WHERE user_ID = :user_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $returnSet = $stmt->fetchAll();;
    if (count($returnSet) == 0) {
      return false;
    } 
    return $returnSet[0]['role'];
  }
}
?>
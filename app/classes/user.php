<?php 
class User {
  private $_user_ID;
  private $_user_mail;
  private $_password;
  private $_avatar;
  private $_role;
  private $_gender;
  private $_birthday;

/**
  * Construction of a user. 
  * @param 
  *
  * @return instance
  */
  public function __construct($id = null, $mail = null, $pw = null, $ava = null, $role = null, $gender = null, $birthday = null) {
    $this->_user_ID = $id;
    $this->_user_mail = $mail;
    $this->_password = $pw;
    $this->_avatar = $ava;
    $this->_role = $role,
    $this->_gender = $gender;
    $this->_birthday = $birthday;
  }

/**
  * get attribute of user 
  * @param string $name
  *
  * @return attribute
  */
  public function __get($name) {
    if (property_exists($name)) {
      return $this->$name;
    } else {
      return null;
    }
  }
  
/**
  * set attribute of user
  * @param string $name 
  * @param string $value
  *
  * @return boolean
  */  
  public function __set($name, $value) {
    if (property_exists($name) and $value != null) {
      $this->$name = $value;
      return true;
    } else {
      return false;
    }
  }

/**
  * Return json type of user. 
  * @param 
  *
  * @return json
  */
  public function __get_json() {

  }
}
?>
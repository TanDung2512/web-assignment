<?php 

/**
 * User class
 */
class User {
   
  /** @var int $_user_ID */
  private $_user_ID;

  /** @var string $_user_mail*/
  private $_user_mail;

  /** @var string $_password*/
  private $_password;

  /** @var string $_role*/
  private $_role;

/**
  * Construction of a user. 
  * @param int $id
  * @param string $mail 
  * @param string $pw
  * @param string $role
  * 
  * @return instance
  */
  public function __construct(
      $id = null, 
      $mail = null, 
      $pw = null, 
      $role = null
    ) {
    $this->_user_ID = $id;
    $this->_user_mail = $mail;
    $this->_password = $pw;
    $this->_role = $role;
  }

/**
  * get attribute of user 
  * @param string $name
  *
  * @return attribute
  */
  public function get($name_in) {
    $name = "_".$name_in;
    if (property_exists("User", $name)) {
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
  public function set($name_in, $value) {
    $name = "_".$name_in;
    if (property_exists("User", $name) and $value != null) {
      $this->name = $value;
      return true;
    } else {
      return false;
    }
  }

/**
  * Return json type of user. 
  * @param 
  *
  * @return json user
  */
  public function get_json() {
    // json_encode(get_object_vars($user));

    $json = array(
      'user_ID' => $this->user_ID,
      'user_mail' => $this->user_mail,
      'password' => $this->password,
      'role' => $this->role
    );

  return json_encode($json);
  }
}
?>
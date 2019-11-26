<?php 


class CV_Section {

}

/**
 * @package app\classes
 * Object CV.
 * 
 */
class CV {
   

  /** @var int $_CV_ID */ 
  private $_CV_ID;

  /** @var string $_avatar */
  private $_avatar;

  /** @var string $_fullname */
  private $_fullname;

  /** @var string $_professional */
  private $_professional;

  /** @var string $_about_me */
  private $_about_me;

  /** @var string $_date_created */
  private $_date_created;

  /** @var string $_address */
  private$_address;

  /** @var string $_phone */
  private $_phone;

  /** @var string $_email */
  private $_email;

  /** @var int $_template_ID */
  private $_template_ID;

  /** @var int $_user_id */
  private $_user_id;

  /** @var string $_category */
  private $_category;

  /** @var CV_Section[] $_experiences */
  private $_experiences;

  /** @var CV_Section[] $_activities */
  private $_activities;

  /** @var CV_Section[] $_achievement */
  private $_achievement;

/**
  * Construction of a CV. 
  * @param int $CV_ID
  * @param string $avatar
  * @param string $fullname
  * @param string $professional
  * @param string $about_me
  * @param string $date_created
  * @param string $address
  * @param string $phone
  * @param string $email
  * @param int $template_ID
  * @param int $user_id
  * @param string $category
  *
  * @return instance
  */
  public function __construct(
        $CV_ID = "",
        $avatar = "",
        $category = "",
        $fullname = "",
        $professional = "",
        $about_me = "",
        $date_created = "",
        $address = "",
        $phone = "",
        $email = "",
        $template_ID = "",
        $user_id = ""
    ) {
        $this->$_CV_ID = $CV_ID;
        $this->$_avatar = $avatar;
        $this->$_fullname = $fullname;
        $this->$_professional = $professional;
        $this->$_about_me = $about_me;
        $this->$_date_created = $date_created;
        $this->$_address = $address;
        $this->$_phone = $phone;
        $this->$_email = $email;
        $this->$_template_ID = $template_ID;
        $this->$_user_id = $user_id;
        $this->$_category = $category;
  }

/**
  * get attribute of cv.
  * @param string $name
  *
  * @return attribute
  */
  public function __get(string $name) {
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
  public function __set(string $name, string $value) {
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
  * @return json user
  */
  public function __get_json(){

    $json = array(
        "CV_ID" => $this->__get("_CV_ID"),
        "avatar" => $this->__get("_avatar"),
        "fullname" => $this->__get("_fullname"),
        "professional" => $this->__get("_professional"),
        "about_me" => $this->__get("_about_me"),
        "date_created" => $this->__get("_date_created"),
        "address" => $this->__get("_address"),
        "phone" => $this->__get("_phone"),
        "email" => $this->__get("_email"),
        "template_ID" => $this->__get("_template_ID"),
        "user_id" => $this->__get("_user_id")  
    );

  return json_encode($json);
  }
}
?>
<?php 

/**
 * @package app\classes
 * Describe subsection of CV.
 * 
 */
class CV_Section {
  /** @var int $ID primary key*/
  private $_ID;

  /** @var int $CV_ID */
  private $_CV_ID;

  /** 
   * @var string $info_flag 
   * 1 is Experience 
   * 2 is Achievement
   * 3 is Activities
   * */
  private $_info_flag;

  /** @var string $start_date */
  private $_start_date;

  /** @var string $end_date */
  private $_end_date;

  /** @var string $title */
  private $_title;

  /** @var string $description */
  private $_description;

  public function __construct(
    int $ID = null,
    int $CV_ID = null,
    string $start_date = null,
    string $end_date = null,
    string $title = null,
    string $description = null
  ){
    $this->_ID = $ID;
    $this->_CV_ID = $CV_ID;
    $this->_start_date = $start_date;
    $this->_end_date = $end_date;
    $this->_title = $title;
    $this->_description = $description;
  }
  /**
  * get attribute of subsection CV.
  * @param string $name
  *
  * @return attribute
  */
  public function __get(string $name) {
    if (property_exists("_"+$name)) {
      return $this["_"+$name];
    } else {
      return null;
    }
  }
  
/**
  * set attribute of subsection CV
  * @param string $name 
  * @param string $value
  *
  * @return boolean
  */  
  public function __set(string $name, string $value) {
    if (property_exists("_"+$name) and $value != null) {
      $this["_"+$name] = $value;
      return true;
    } else {
      return false;
    }
  }

/**
  * Return json type of subsection. 
  * @param 
  *
  * @return json 
  */
  public function __get_json(){
    $json = array(
        "_ID" => $this->__get("ID"),
        "_CV_ID" => $this->__get("CV_ID"),
        "_start_date" => $this->__get("start_date"),
        "_end_date" => $this->__get("end_date"),
        "_title" => $this->__get("title"),
        "_description" => $this->__get("description")
    );

  return json_encode($json);
  }
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
  * @param CV_Section $experiences,
  * @param CV_Section[] $activities,
  * @param CV_Section[] $
  * @return instance
  */
  public function __construct(
        $CV_ID = null,
        $avatar = null,
        $category = null,
        $fullname = null,
        $professional = null,
        $about_me = null,
        $date_created = null,
        $address = null,
        $phone = null,
        $email = null,
        $template_ID = null,
        $user_id = null
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
    if (property_exists("_"+$name)) {
      return $this["_"+$name];
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
    if (property_exists("_"+$name) and $value != null) {
      $this["_"+$name] = $value;
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
        "CV_ID" => $this->__get("CV_ID"),
        "avatar" => $this->__get("avatar"),
        "fullname" => $this->__get("fullname"),
        "professional" => $this->__get("professional"),
        "about_me" => $this->__get("about_me"),
        "date_created" => $this->__get("date_created"),
        "address" => $this->__get("address"),
        "phone" => $this->__get("phone"),
        "email" => $this->__get("email"),
        "template_ID" => $this->__get("template_ID"),
        "user_id" => $this->__get("user_id")  
    );

  return json_encode($json);
  }
}
?>
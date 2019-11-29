<?php 


/**
 * @package app\classes
 * Describe TemplateCV.
 * 
 */

 class TemplateCV{
   /** @var int $ID primary key*/
   public $ID;

   /** @var string $template_html */
   public $template_html;

   /** @var string $template_img */
   public $template_img;

   public function __construct(
     $ID,
     $template_html,
     $template_img
   ){
    $this->ID = $ID;
    $this->template_html = $template_html;
    $this->template_img = $template_img;
   }

   public function __get_json(){
    $json = array(
      "ID" => $this->ID,
      "template_html" => $this->template_html,
      "template_img" => $this->template_img,
  );

  return json_encode($json);
  }
 }
/**
 * @package app\classes
 * Describe subsection of CV.
 * 
 */
class CV_Section {
  /** @var int $ID primary key*/
  public $ID;

  /** @var int $CV_ID */
  public $CV_ID;

  /** 
   * @var string $info_flag 
   * 1 is Experience 
   * 2 is Education
   * */
  public $info_flag;

  /** @var string $start_date */
  public $start_date;

  /** @var string $end_date */
  public $end_date;

  /** @var string $title */
  public $title;

  /** @var string $description */
  public $description;

  public function __construct(
    int $ID = null,
    int $CV_ID = null,
    string $info_flag = null,
    string $start_date = null,
    string $end_date = null,
    string $title = null,
    string $description = null
  ){
    $this->ID = $ID;
    $this->CV_ID = $CV_ID;
    $this->info_flag = $info_flag;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    $this->title = $title;
    $this->description = $description;
  }


/**
  * Return json type of subsection. 
  * @param 
  *
  * @return json 
  */
  public function get_json(){
    $json = array(
        "ID" => $this->ID,
        "CV_ID" => $this->CV_ID,
        "info_flag" => $this->info_flag,
        "start_date" => $this->start_date,
        "end_date" => $this->end_date,
        "title" => $this->title,
        "description" => $this->description
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
   

  /** @var int $CV_ID */ 
  public $CV_ID;

  /** @var string $avatar */
  public $avatar;

  /** @var string $fullname */
  public $fullname;

  /** @var string $professional */
  public $professional;

  /** @var string $about_me */
  public $about_me;

  /** @var string $date_created */
  public $date_created;

  /** @var string $address */
  public$address;

  /** @var string $phone */
  public $phone;

  /** @var string $email */
  public $email;

  /** @var int $template_ID */
  public $template_ID;

  /** @var int $user_id */
  public $user_id;

  /** @var string $category */
  public $category;

  /** @var CV_Section[] $experiences */
  public $experiences;

  /** @var CV_Section[] $Education */
  public $Education;


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
  * @param CV_Section[] $experiences
  * @param CV_Section[] $Education
  *
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
        $user_id = null,
        $experiences = null,
        $Education = null
    ) {
        $this->CV_ID = $CV_ID;
        $this->avatar = $avatar;
        $this->fullname = $fullname;
        $this->professional = $professional;
        $this->about_me = $about_me;
        $this->date_created = $date_created;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->template_ID = $template_ID;
        $this->user_id = $user_id;
        $this->category = $category;
        $this->experiences = $experiences;
        $this->Education = $Education;
  }

/**
  * get attribute of cv.
  * @param string $name
  *
  * @return attribute
  */
  // public function get(string $name) {
  //   $name = "_".$name;
  //   var_dump($name);
  //   if (property_exists("CV", $name)) {
  //     return $this->getProperty($name);
  //   } else {
  //     return null;
  //   }
  // }
  
/**
  * set attribute of user
  * @param string $name 
  * @param string $value
  *
  * @return boolean
  */  
  // public function set(string $name, string $value) {
  //   $name = "_".$name;
  //   if (property_exists("CV",$name) and $value != null) {
  //     $this[$name] = $value;
  //     return true;
  //   } else {
  //     return false;
  //   }
  // }

  public function convertArrayCVSectionToJson($list){
    if($list == NULL) return NULL;

    $temp_list = [];
    foreach($list as $item){
      array_push($temp_list, $item->get_json());
    }
    return $temp_list;
  }
/**
  * Return json type of user. 
  * @param 
  *
  * @return json user
  */
  public function get_json(){
    $experiences = $this->convertArrayCVSectionToJson($this->experiences);
    $Education = $this->convertArrayCVSectionToJson($this->Education);

    $json = array(
        "CV_ID" => $this->CV_ID,
        "avatar" => $this->avatar,
        "fullname" => $this->fullname,
        "professional" => $this->professional,
        "about_me" => $this->about_me,
        "date_created" => $this->date_created,
        "address" => $this->address,
        "phone" => $this->phone,
        "email" => $this->email,
        "template_ID" => $this->template_ID,
        "user_ID" => $this->user_id,
        "experiences" => $experiences,
        "Education" => $Education
    );

  return json_encode($json);
  }
}
?>
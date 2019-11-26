<?php

require_once(__DIR__."/../database/connect_DB.php");
include_once(__DIR__."/../classes/user.php");

 /**
  * 
  * This class provides all cv-relating functions.
  * @package app\services
  *
  * @method  getTemplateCV()
  * @method  getCVByID()
  * @method  getCVsByUserID(int $user_ID)
  * @method  insertCV(int $user_ID)
  * @method  editCVByID()
  * @method  deleteCVByID()
  * @method  getCVsByType()
  */
class CVService{

 /**
  * @var connectDB $db_connection hold DB's connection
  */   
  private $db_connection;

  /**
  * initiate connection DB,
  *
  * @return void
  */   
  public function __construct() {
      $db_connection = connectDB::getInstance();
  }
/**
  * insert CV into database. 
  * 
  * @param int $CV_ID
  * @param int $user_id
  * @param string $avatar
  * @param string $fullname
  * @param string $professional
  * @param string $about_me
  * @param string $date_created
  * @param string $address
  * @param string $phone
  * @param string $email
  * @param string $template_ID
  *
  * @return boolean true if insert successfully
  */  
  public function insertCV(
    int $CV_ID,
    int $user_id,
    string $avatar,
    string $fullname,
    string $professional,
    string $about_me,
    string $date_created,
    string $address,
    string $phone,
    string $email,
    string $template_ID
  ) {
    //TODO 
  }

  /**
    * get list of CVs by user ID
    * @param int $user_ID 
    *
    * @return CV[] return array of CV if find, empty array if not found
    */  
  public function getCVsByUserID(int $user_ID) {
    //TODO
  }

  /**
  * get CV by CV_ID.
  * @param int $CV_ID
  *
  * @return CV|false return CV object if found or return false if can not found
  */
  public function getCVByID(int $CV_ID) {
    //TODO
  }

  /**
  * update CV's column.
  * @param int $cv_ID
  * @param string $category specify category to insert into database, it need to match with column's name in database 
  * @param string $section_ID (optional) use only when we need to update section_ID of cv 
  * @param string $content 
  * @return boolean return true if edit successfully
  */  
  public function editCVByID(int $cv_ID,string $category, $section_ID = null,string $content)  {
    //TODO
  }

  /**
  * delete CV by CV_ID
  * @param int $CV_ID
  *
  * @return boolean
  */  
  public function deleteCVByID(int $CV_ID) {
    //TODO
  }

  /**
  * get template CV by templateCV_ID
  * @param int $templateCV_ID
  *
  * @return templateCV|false
  */  
  public function getTemplateCV(int $templateCV_ID){
    //TODO
  }

  /**
  * search CVs by category .
  * @param string $type specify category of CV. Ex: fullname, age, professtional,etc... 
  * @param string $content specify content of category
  *
  * @return CV[] return empty list if not found
  */   
  public function getCVsByType(string $type, string $content){
    //TODO
  }
}
?>
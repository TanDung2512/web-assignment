<?php

require_once(__DIR__."/../database/connect_DB.php");
require_once(__DIR__."/../classes/user.php");
require_once(__DIR__."/../classes/cv.php");


 /**
  * 
  * This class provides all cv-relating functions.
  * @package app\services
  *
  * @method  getTemplateCVByID()
  * @method  getCVByID()
  * @method  getCVsByUserID(int $user_ID)
  * @method  insertCV(int $user_ID)
  * @method  editCVByID()
  * @method  deleteCVByID()
  * @method  getCVsByType()
  * @method  isOwnerOfCV()
  * @method  getTemplateCVs()
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
      $this->db_connection = connectDB::getInstance()->getConnection();
  }
/**
  * insert CV into database. 
  * 
  * @param int $user_id
  * @param string $avatar
  * @param string $fullname
  * @param string $professional
  * @param string $about_me
  * @param string $date_created
  * @param string $category
  * @param string $address
  * @param int $phone
  * @param string $email
  * @param int $template_ID
  * @param CV_Section[] experiences
  * @param CV_Section[] education 
  *
  * @return boolean true if insert successfully
  */  
  public function insertCV(
    int $user_id = NULL,
    string $avatar = NULL,
    string $fullname = NULL,
    string $professional = NULL,
    string $about_me = NULL,
    string $date_created = NULL,
    string $category = NULL,
    string $address = NULL,
    int $phone = NULL,
    string $email = NULL,
    int $template_ID = NULL,
    array $experiences = NULL,
    array $education = NULL
  ) {
    $date_created_formated = $date_created ? date("Y-m-d", $date_created) : NULL;

    $query = 'INSERT INTO cv (avatar, fullname, professional, about_me, date_created, category, address, phone, email, template_ID, user_id)
    VALUES(:avatar, :fullname, :professional, :about_me, :date_created, :category, :address, :phone, :email, :template_ID, :user_id)';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
    $stmt->bindParam(':template_ID', $template_ID, PDO::PARAM_INT);
    $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':professional', $professional, PDO::PARAM_STR);
    $stmt->bindParam(':about_me', $about_me, PDO::PARAM_STR);
    $stmt->bindParam(':date_created', $date_created_formated, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $result = $stmt->execute();

    $CV_ID = $this->db_connection->lastInsertId();
    
    if($experiences != NULL){
      foreach($experiences as $experience){
        $e_json = $experience->get_json();
        $e_json = json_decode( $e_json, true );
       // var_dump($e_json);
        $result = $result && $this->insertCVSection(
          $CV_ID, 
          $e_json["info_flag"], 
          $e_json["start_date"], 
          $e_json["end_date"],
          $e_json["title"], 
          $e_json["description"]
        );
      }
    }

    if($education != NULL){
      foreach($education as $education_item){
        $e_json = $education_item->get_json();
        $e_json = json_decode( $e_json, true );
        $result = $result && $this->insertCVSection(
          $CV_ID, 
          $e_json["info_flag"], 
          $e_json["start_date"], 
          $e_json["end_date"],
          $e_json["title"], 
          $e_json["description"]);
      }
    }
    return $result ? $CV_ID : false;
  }

  /**
  * insert CV_Section into database. 
  * 
  * @param int $CV_ID
  * @param string $info_flag
  * @param string $start_date
  * @param string $end_date
  * @param string $title
  * @param string $description
  *
  * @return boolean true if insert successfully
  */  
  public function insertCVSection(
    int $CV_ID = NULL,
    string $info_flag = NULL,
    string $start_date = NULL,
    string $end_date = NULL,
    string $title = NULL,
    string $description = NULL
  ){

    $start_date_formated = $start_date ? date("Y-m-d", strtotime($start_date)): NULL;
    $end_date_formated = $end_date ? date("Y-m-d", strtotime($end_date)): NULL;

    $query = 'INSERT INTO info (CV_ID, info_flag, start_date, end_date, title, description)
    VALUES(:CV_ID, :info_flag, :start_date, :end_date, :title, :description)';
    
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':CV_ID', $CV_ID, PDO::PARAM_INT);
    $stmt->bindParam(':info_flag', $info_flag, PDO::PARAM_STR);
    $stmt->bindParam(':start_date', $start_date_formated, PDO::PARAM_STR);
    $stmt->bindParam(':end_date', $end_date_formated, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    $result = $stmt->execute();
    return $result;
  }

  /**
    * get list of CV_Section by CV_ID and Type
    * @param int $CV_ID 
    * @param string $type
    *
    * @return CV_Section[]|false return array of CV if find, empty array if not found
    */  

  public function getCVSectionsByCVID(int $CV_ID, string $type){
    if($CV_ID == NULL || $type == NULL) return false;
    
    $query = 'SELECT * FROM info 
              WHERE CV_ID = :CV_ID 
              AND info_flag = :info_flag';

    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':CV_ID', $CV_ID, PDO::PARAM_INT);
    $stmt->bindParam(':info_flag', $type, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll(); 
    //var_dump($resultSet);
    if (count($resultSet) != 0) {
      $returnArr = [];
      //var_dump($resultSet);
      foreach($resultSet as $CVSec){
        $newCVSec = new CV_Section(
           $CVSec["ID"] ,
           $CVSec["CV_ID"] ,
           $CVSec["info_flag"] ,
           $CVSec["start_date"] ,
           $CVSec["end_date"] ,
           $CVSec["title"] ,
           $CVSec["description"] 
        );
        array_push($returnArr, $newCVSec);
      }
      return $returnArr;
    }
    return false;
  }
  /**
    * get list of CVs by user ID
    * @param int $user_ID 
    *
    * @return CV[] return array of CV if find, empty array if not found
    */  
  public function getCVsByUserID(int $user_ID = NULL) {
    if($user_ID == NULL) return false;
    
    $query = 'SELECT * FROM cv WHERE user_ID = :user_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll(); 

    if (count($resultSet) != 0) {
      $returnArr = [];
      foreach($resultSet as $cv){
        $experiences = $this->getCVSectionsByCVID($cv["CV_ID"], "1");
        $education = $this->getCVSectionsByCVID($cv["CV_ID"], "2");
        if(!$experiences) $experiences = NULL;
        if(!$education) $education = NULL;

        $newCV = new CV(
          $cv["CV_ID"],
          $cv["avatar"],
          $cv["category"],
          $cv["fullname"],
          $cv["professional"],
          $cv["about_me"],
          $cv["date_created"],
          $cv["address"],
          $cv["phone"],
          $cv["email"],
          $cv["template_ID"],
          $cv["user_id"],
          $experiences,
          $education
        );
          
        array_push($returnArr, $newCV);

      }
      return $returnArr;
    }
    return false;
  }

  /**
  * get CV by CV_ID.
  * @param int $CV_ID
  *
  * @return CV|false return CV object if found or return false if can not found
  */
  public function getCVByID(int $CV_ID) {
    if($CV_ID == NULL) return false;
    
    $query = 'SELECT * FROM cv WHERE CV_ID = :CV_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':CV_ID', $CV_ID, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    
    if (count($result) == 1) {
      $experiences = $this->getCVSectionsByCVID($result[0]["CV_ID"], "1");
      $education = $this->getCVSectionsByCVID($result[0]["CV_ID"], "2");
      if(!$experiences) $experiences = NULL;
      if(!$education) $education = NULL;

        $cv = new CV(
          $result[0]["CV_ID"],
          $result[0]["avatar"],
          $result[0]["category"],
          $result[0]["fullname"],
          $result[0]["professional"],
          $result[0]["about_me"],
          $result[0]["date_created"],
          $result[0]["address"],
          $result[0]["phone"],
          $result[0]["email"],
          $result[0]["template_ID"],
          $result[0]["user_id"],
          $experiences,
          $education
        );
      return $cv;
    }
    return false;
  }

  /**
  * update CV's column.
  * @param int $CV_ID use only when we need to update cv otherwise NULL
  * @param string $section_ID use only when we need to update section_ID of cv otherwise NULL
  * @param string $category specify category to insert into database, it need to match with column's name in database 
  * @param string $content 
  *
  * @return boolean return true if edit successfully
  */  
  public function editCVByID(string $category, string $content, int $CV_ID, int $section_ID = null)  {
    if($category == NULL || $content == NULL) return false;

    if($section_ID == NULL){
      $query = 'UPDATE cv SET '.$category.' = :content WHERE CV_ID = :CV_ID';
      $stmt = $this->db_connection->prepare($query);
      $stmt->bindParam(':CV_ID', $CV_ID, PDO::PARAM_INT);
      $stmt->bindParam(':content', $content, PDO::PARAM_STR);
      $result = $stmt->execute();
      return $result;
    }
    else{
      $query = 'UPDATE info SET '.$category.' = :content WHERE ID = :section_ID';
      $stmt = $this->db_connection->prepare($query);
      $stmt->bindParam(':section_ID', $section_ID, PDO::PARAM_INT);
      $stmt->bindParam(':content', $content, PDO::PARAM_STR);
      $result = $stmt->execute();
      return $result;
    }
  }


  /**
  * edit CV_Section into database. 
  * 
  * @param int $ID
  * @param string $start_date
  * @param string $end_date
  * @param string $title
  * @param string $description
  *
  * @return boolean true if edit successfully
  */  
  public function editCVSection(
    int $ID = NULL,
    string $start_date = NULL,
    string $end_date = NULL,
    string $title = NULL,
    string $description = NULL
  ){
    if($ID == NULL) return false;

    $start_date_formated = $start_date ? date("Y-m-d", strtotime($start_date)): NULL;
    $end_date_formated = $end_date ? date("Y-m-d", strtotime($end_date)): NULL;

    $query = 'UPDATE info start_date = :start_date, end_date = :end_date, title = :title, description = :description
              WHERE ID = :ID';
    
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
    $stmt->bindParam(':start_date', $start_date_formated, PDO::PARAM_STR);
    $stmt->bindParam(':end_date', $end_date_formated, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    $result = $stmt->execute();
    return $result;
  }

  /**
  * update CV's columns.
  * @param int $CV_ID 
  * @param string $avatar
  * @param string $fullname
  * @param string $professional
  * @param string $about_me
  * @param string $date_created
  * @param string $category
  * @param string $address
  * @param int $phone
  * @param string $email
  * @param int $template_ID
  *
  * @return boolean return true if edit successfully
  */  
  public function editCVByIDCols(
    int $CV_ID,
    string $avatar = NULL,
    string $fullname = NULL,
    string $professional = NULL,
    string $about_me = NULL,
    string $date_created = NULL,
    string $category = NULL,
    string $address = NULL,
    int $phone = NULL,
    string $email = NULL,
    int $template_ID = NULL,
    array $experiences = NULL,
    array $education = NULL
  ){
    $date_created_formated = $date_created ? date("Y-m-d", $date_created) : NULL;

    $query = 'UPDATE cv SET avatar = :avatar, fullname = :fullname, professional = :professional, about_me = :about_me, date_created = :date_created, category = :category, address = :address, phone = :phone, email = :email, template_ID = :template_ID
              WHERE CV_ID = :CV_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':CV_ID', $CV_ID, PDO::PARAM_INT);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
    $stmt->bindParam(':template_ID', $template_ID, PDO::PARAM_INT);
    $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':professional', $professional, PDO::PARAM_STR);
    $stmt->bindParam(':about_me', $about_me, PDO::PARAM_STR);
    $stmt->bindParam(':date_created', $date_created_formated, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $result = $stmt->execute();
    
    if($experiences != NULL){
      foreach($experiences as $experience){
        $e_json = $experience->get_json();
        $e_json = json_decode( $e_json, true );
        $result = $result && $this->editCVSection(
          $e_json["ID"], 
          $e_json["info_flag"], 
          $e_json["start_date"], 
          $e_json["end_date"],
          $e_json["title"], 
          $e_json["description"]
        );
      }
    }

    if($education != NULL){
      foreach($education as $education_item){
        $e_json = $education_item->get_json();
        $e_json = json_decode( $e_json, true );
        $result = $result && $this->editCVSection(
          $e_json["ID"], 
          $e_json["info_flag"], 
          $e_json["start_date"], 
          $e_json["end_date"],
          $e_json["title"], 
          $e_json["description"]);
      }
    }
    return $result;
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
  public function getTemplateCVByID(int $templateCV_ID){
    if($templateCV_ID == NULL) return false;

    $query = 'SELECT * FROM cv_template WHERE template_ID = :templateCV_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':templateCV_ID', $templateCV_ID, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetchAll(); 

    if (count($result) == 1) {
      $newTemplate = new TemplateCV(
        $result[0]["template_ID"],
        $result[0]["template_html"],
        $result[0]["template_img"]
      );
      return $newTemplate;
    }
    return false;
  }

  /**
  * search CVs by category .
  * @param string $type specify category of CV. Ex: fullname, age, profestional,etc... 
  * @param string $content specify content of category
  *
  * @return CV[] return empty list if not found
  */   
  public function getCVsByType(string $type, string $content){
    if($type == NULL || $content == NULL) return false;
    $content ='%'.$content.'%';
    $query = 'SELECT * FROM cv WHERE '.$type.' LIKE :content';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll(); 

    if (count($resultSet) != 0) {
      $returnArr = [];
      foreach($resultSet as $cv){
        $experiences = $this->getCVSectionsByCVID($cv["CV_ID"], "1");
        $education = $this->getCVSectionsByCVID($cv["CV_ID"], "2");

        if(!$experiences) $experiences = NULL;
        if(!$education) $education = NULL;

        $newCV = new CV(
          $cv["CV_ID"],
          $cv["avatar"],
          $cv["category"],
          $cv["fullname"],
          $cv["professional"],
          $cv["about_me"],
          $cv["date_created"],
          $cv["address"],
          $cv["phone"],
          $cv["email"],
          $cv["template_ID"],
          $cv["user_id"],
          $experiences,
          $education
        );
          
        array_push($returnArr, $newCV);
      }
      return $returnArr;
    }
    return false;
  }

  /**
  * check if CV belongs to a user
  * @param int $cv_ID
  * @param int $user_ID
  *
  * @return boolean
  */    
  public function isOwnerOfCV (int $user_ID, int $cv_ID) {
    $query = 'SELECT * FROM users, cv
              WHERE users.user_ID = :user_ID 
                AND users.user_ID = cv.user_id 
                AND CV_ID = :cv_ID';
    $stmt = $this->db_connection->prepare($query);
    $stmt->bindParam(':user_ID', $user_ID, PDO::PARAM_INT);
    $stmt->bindParam(':cv_ID', $cv_ID, PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $returnSet = $stmt->fetchAll();
    if (count($returnSet) == 0) {
      return false;
    }
    return true;
  }

  /**
  * get all templates
  *
  * @return Array | boolean
  */    
  public function getTemplateCVs () {
    $query = 'SELECT * FROM cv_template'; 
    $stmt = $this->db_connection->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $returnSet = $stmt->fetchAll();

    if (count($returnSet) != 0) {
      $returnArr = [];

      foreach($returnSet as $template){
        $newTemp = new TemplateCV(
          $template["template_ID"],
          $template["template_html"],
          $template["template_img"]
        );
          
        array_push($returnArr, $newTemp);
      }
      return $returnArr;
    }
    return false;
  }

}
?>
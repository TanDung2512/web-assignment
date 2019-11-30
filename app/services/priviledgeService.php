<?php
require_once(__DIR__."/../classes/userService.php");


 /**
  * @package app\services
  * This class provides static priviledge function
  *
  * @method boolean isVIP()
  * @method boolean upgradeVIP(string $code)
  */
class PriviledgeService {

    private $userService;
    public function __constructor(){
        $this->userService = new UserService();
    } 

    /**
    * check whether user is login
    *
    * @return boolean
    */  
    public function isLogin(){
        if(isset($_SESSION["user_ID"])){
            return true;
        }
        return false;
    }


    /**
    * check whether user is VIP
    *
    * @return boolean
    */  
    public function isVIP(){
        if(!isset($_SESSION["user_ID"])) return false;

        $response_value = $this->userService->getRoleByID($_SESSION["user_ID"]);

        if($response_value == "VIP"){
            return true;
        }
        else return false;
    }


    /**
    * upgrade VIP role
    *
    * @param string $code
    *
    * @return boolean
    */  
    public function upgradeVIP($code){
        if(!isset($_SESSION["user_ID"]) || $this->isVIP()) return false;
        return $this->userService->updateRoleByID($_SESSION["user_ID"], "VIP");

    }

    
}
?>

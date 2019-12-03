<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../services/priviledgeService.php";

class UpgradeVipController extends Controller
{
    private $priService; 
    public function __construct()
    {
        parent::__construct();
        $this->priService = new PriviledgeService();
    }

    public function upgradeVIP(){
        if($this->priService->upgradeVIP($_POST["vip_code"])){
            return true;
        }
        else{
            $_SESSION["error_code"] = "Upgrade vip code is not valid";
            return false;
        }
    }
    
    public function render()
    {
        parent::getView("upgrade");
    }
}

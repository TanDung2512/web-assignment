<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    class MyCVController extends Controller{

        private $cvService;

        public function __construct(){
            parent::__construct();
            $this->cvService = new CVService();
        }

        public function getCVs() {
            return $this->cvService->getCVsByUserID($_SESSION["user_ID"]);
        }

        public function render(){
            GLOBAL $cvs;
            $cvs = $this->getCVs();
            parent::getView("myCV");
        }
    }
?>
<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    require_once __DIR__."/../services/priviledgeService.php";

    class PreviewCVController extends Controller{
        private $cvService;
        private $priviledgeService;
        public function __construct(){
            parent::__construct();
            $this->cvService = new cvService();
            $this->priviledgeService = new PriviledgeService();
        }

        public function render(){
            parent::getView("previewCV");
        }

        public function renderCV(int $CV_ID){
            parent::getView("previewCV");
        }

        public function isPriviledge(){
            if($this->priviledgeService->isVIP()) return true;
            if($this->isOwnerOfCV()) return true;
            return false;
        }

        public function isOwnerOfCV(){
            return $this->cvService->isOwnerOfCV($_SESSION["user_ID"], $_GET["CV_ID"]);
        }

        public function getCV(int $CV_ID){
            $cv = $this->cvService->getCVByID($CV_ID);
            $template_cv = $this->cvService->getTemplateCVByID($cv->template_ID)->get_json();
            
            $response_json = array(
                "cv" => $cv,
                "template_cv" => $template_cv
            );

            echo json_encode($response_json);
        }
    }
?>
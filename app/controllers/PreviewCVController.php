<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    class PreviewCVController extends Controller{
        private $cvService;
        public function __construct(){
            parent::__construct();
            $this->cvService = new cvService();
        }

        public function render(){
            parent::getView("previewCV");
        }

        public function renderCV(int $CV_ID){
            parent::getView("previewCV");
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
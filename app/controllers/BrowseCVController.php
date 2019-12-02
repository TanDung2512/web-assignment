<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";

    class BrowseCVController extends Controller{

        private $cvService;

        public function __construct(){
            parent::__construct();
            $this->cvService = new CVService();
        }

        public function getTemplates() {
            return $this->cvService->getTemplateCVs();
        }

        public function render(){
            $_REQUEST["templates"] = $this->getTemplates();
            parent::getView("browseCV");
        }

    }
?>
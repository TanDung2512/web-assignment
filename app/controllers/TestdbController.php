<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    class TestdbController extends Controller{

        public function __construct(){
            parent::__construct();
        }

        public function render(){
            $cvService = new CVService();
            var_dump($cvService->getTemplateCVByID(1));
        }
    }
?>

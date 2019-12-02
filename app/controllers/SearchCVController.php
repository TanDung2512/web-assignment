<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    class SearchCVController extends Controller{
        private $cvService;

        public function __construct(){
            parent::__construct();
            $this->cvService = new cvService();
        }
        public function searchCV(){
            if(!isset($_GET["key_word"])) return [];
            return $this->cvService->searchCV($_GET["key_word"]);       
        }

        public function render(){
            $_REQUEST["cv-list"] = $this->searchCV();
            parent::getView("searchCV");
        }

    }
?>
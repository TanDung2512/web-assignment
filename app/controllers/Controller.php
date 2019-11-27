<?php 
    require_once __DIR__."/../views/view.php" ;
    class Controller {

        protected $view; 

        public function __construct(){
            $this->view = new View();
        }

        public function getView($page){
            $this->view->getView($page);
        }
    }
?>
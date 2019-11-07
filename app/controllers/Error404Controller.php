<?php
    require_once __DIR__."/Error404.php";
    class EditCVController extends Controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function render(){
            parent::getView("error404");
        }

    }
?>
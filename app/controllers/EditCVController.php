<?php
    require_once __DIR__."/Controller.php";
    class EditCVController extends Controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function render(){
            parent::getView("editCV");
        }

    }
?>
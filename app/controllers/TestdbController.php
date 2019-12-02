<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    require_once __DIR__."/../services/userService.php";
    require_once __DIR__."/../services/authenticationService.php";
    
    class TestdbController extends Controller{

        public function __construct(){
            parent::__construct();
        }

        public function render(){

           // $cv = new cvService();
//            var_dump($cv->getTemplateCVs());

            // $auth = new AuthenService();
            // var_dump($auth->signup('c@c.c', 'ccc', 'ccc'));
            // var_dump($auth->signin('c@c.c', 'ccc'));
            // var_dump($auth->signout());
        }
    }
?>
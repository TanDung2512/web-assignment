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
            // $auth = new CVService();
            // var_dump("haha");
            // var_dump($auth->signup('c@c.c', 'ccc', 'ccc'));
            // var_dump($auth->signin('c@c.c', 'ccc'));
            // var_dump($auth->signout());
            // var_dump($auth->isOwnerOfCV(1000, 1));
            // var_dump($auth->getTemplateCVs());
        }
    }
?>
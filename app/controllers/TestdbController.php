<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/userService.php";
    class TestdbController extends Controller{

        public function __construct(){
            parent::__construct();
        }


        public function render(){
            $tmp = new UserService();
            // var_dump($tmp);
            $res = $tmp->getUserByID(1);
            var_dump($res->get("user_mail"));
        }
    }
?>
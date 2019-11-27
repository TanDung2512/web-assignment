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
            $res = $tmp->createUser(1, "a@a.a", "aaa", "huhu", "user", "F", "2019-1-12");
            // var_dump($res);
            // parent::getView("testdb");
        }

    }
?>
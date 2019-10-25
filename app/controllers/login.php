<?php
    require_once __DIR__."/../views/layouts/login.php";
    class LoginController {

        private $loginView;
        public function __constructor(){

        }

        public function handleLogin(){
            echo $_POST["user_name"];

        }

        public function render(){
            $loginView = new Login();
            $loginView->render();
        }

    }
?>
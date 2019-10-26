<?php 

    class View{
        public function  __construct(){

        }

        public function getView($page){

                include_once __DIR__."/partial/head.php";

            include_once __DIR__."/layouts/{$page}.php";
        }
    }
?>
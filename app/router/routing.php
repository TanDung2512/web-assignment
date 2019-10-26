<?php

require_once __DIR__."/../classes/Router.php";

/*
* require Controllers
*/

require_once __DIR__."/../controllers/LoginController.php";
require_once __DIR__."/../controllers/HomeController.php";
require_once __DIR__."/../controllers/RegisterController.php";
require_once __DIR__."/../controllers/ChooseCVController.php";
require_once __DIR__."/../controllers/EditCVController.php";
require_once __DIR__."/../controllers/MyCVController.php";

define("ROOT_DIR","web-assignment");

Router::GET('/', function () {
    $home = new HomeController();
    $home->render();
});

Router::GET('/login', function () {
    $login = new LoginController();
    $login->render();
});

Router::GET('/register', function () {
    $register = new RegisterController();
    $register->render();
});

Router::GET('/chooseCV', function () {
    $chooseCV = new ChooseCVController();
    $chooseCV->render();
});

Router::GET('/myCV', function () {
    $myCV = new MyCVController();
    $myCV->render();
});

Router::GET('/editCV', function () {
    $editCV = new EditCVController();
    $editCV->render();
});


$action = $_SERVER['REQUEST_URI'];
$action = str_replace("web-assignment/", "",$action);
Router::dispatch($action);

?>
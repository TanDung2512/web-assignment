<?php
require_once __DIR__."/../classes/router.php";


/*
* require Controllers
*/

require_once __DIR__."/../controllers/login.php";
require_once __DIR__."/../controllers/home.php";
require_once __DIR__."/../controllers/register.php";
require_once __DIR__."/../controllers/chooseCV.php";
require_once __DIR__."/../controllers/editCV.php";
require_once __DIR__."/../controllers/myCV.php";

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
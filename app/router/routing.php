<?php

require_once __DIR__ . "/../classes/Router.php";

/*
* require Controllers
*/

require_once __DIR__ . "/../controllers/LoginController.php";
require_once __DIR__ . "/../controllers/HomeController.php";
require_once __DIR__ . "/../controllers/LandingController.php";
require_once __DIR__ . "/../controllers/RegisterController.php";
require_once __DIR__ . "/../controllers/ChooseCVController.php";
require_once __DIR__ . "/../controllers/EditCVController.php";
require_once __DIR__ . "/../controllers/MyCVController.php";
require_once __DIR__ . "/../controllers/PreviewCVController.php";
require_once __DIR__ . "/../controllers/BrowseCVController.php";
require_once __DIR__ . "/../controllers/TestdbController.php"


define("ROOT_DIR", "web-assignment");

Router::GET('/', function () {
    $home = new HomeController();
    $home->render();
});

Router::GET('/landing', function () {
    $home = new LandingController();
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

Router::GET('/previewCV', function () {
    $previewCV = new PreviewCVController();
    $previewCV->render();
});

Router::GET('/editCV', function () {
    $editCV = new EditCVController();
    $editCV->render();
});

Router::GET('/browseCV', function () {
    $browseCV = new BrowseCVController();
    $browseCV->render();
});

Router::GET('/testdb', function () {
    $testdb = new TestdbController();
    $testdb->render();
});


$action = $_SERVER['REQUEST_URI'];
$action = str_replace("web-assignment/", "", $action);
Router::dispatch($action);

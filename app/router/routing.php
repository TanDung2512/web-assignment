<?php

require_once __DIR__ . "/../classes/router.php";

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
require_once __DIR__ . "/../controllers/TestdbController.php";
require_once __DIR__ . "/../controllers/TemplateController.php";
require_once __DIR__ . "/../controllers/TemplateController2.php";
require_once __DIR__ . "/../controllers/Error404Controller.php";
require_once __DIR__ . "/../controllers/FakeController.php";
require_once __DIR__ . "/../services/authenticationService.php";


define("ROOT_DIR", "web-assignment");

Router::GET('/', function () {
    $home = new LandingController();
    $home->render();
});

Router::GET('/landing', function () {
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

Router::POST('/fake', function () {
    $myCV = new FakeController();
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

Router::GET('/template', function () {
    $testdb = new TemplateController2();
    $testdb->render();
});

Router::POST('/login-authen', function() {
    $authenService = new AuthenService();
    echo $authenService->signin($_POST["mail"], $_POST["password"]);
});

Router::POST('/register-authen', function() {
    $authenService = new AuthenService();
    echo $authenService->signup($_POST["mail"], $_POST["password"], $_POST["password2"]);
});

Router::POST('/logout-authen', function() {
    $authenService = new AuthenService();
    $authenService->signout();
});

Router::POST('/editCV', function() {
   // var_dump($_POST);
   $editCVController = new EditCVController();
   var_dump($editCVController->submitCV());
   
});
$action = $_SERVER['REQUEST_URI'];
$action = str_replace("web-assignment/", "", $action);
Router::dispatch($action);

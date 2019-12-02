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
require_once __DIR__ . "/../controllers/UpgradeVipController.php";
require_once __DIR__ . "/../controllers/Error404Controller.php";
require_once __DIR__ . "/../controllers/FakeController.php";
require_once __DIR__ . "/../services/authenticationService.php";
require_once __DIR__ . "/../controllers/SearchCVController.php";
require_once __DIR__ . "/../services/priviledgeService.php";


define("ROOT_DIR", "web-assignment");

Router::GET('/', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $home = new HomeController();
        $home->render();
    } else {
        $home = new LandingController();
        $home->render();
    }
});

Router::GET('/landing', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $home = new HomeController();
        $home->render();
    } else {
        $home = new LandingController();
        $home->render();
    }
});

Router::GET('/login', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $home = new HomeController();
        $home->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::GET('/register', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $home = new HomeController();
        $home->render();
    } else {
        $register = new RegisterController();
        $register->render();
    }
});

Router::GET('/chooseCV', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $chooseCV = new ChooseCVController();
        $chooseCV->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::GET('/myCV', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $myCV = new MyCVController();
        $myCV->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::POST('/fake', function () {
    $myCV = new FakeController();
    $myCV->render();
});

Router::GET('/previewCV', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $previewCV = new PreviewCVController();
        if (!isset($_GET["CV_ID"]) || !$previewCV->isPriviledge()) {
            $editCV = new EditCVController();
            $editCV->render();
        }
        echo "<script>var CV_ID = " . $_GET["CV_ID"] . "</script>";
        $previewCV->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::GET('/editCV', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $editCV = new EditCVController();
        $previewCV = new PreviewCVController();
        if (isset($_GET["CV_ID"]) AND $previewCV->isOwnerOfCV()) {
            echo "<script>var CV_ID = " . $_GET["CV_ID"] . "</script>";
        } else if (isset($_GET["template_ID"])) {
            echo "<script>var template_ID = " . $_GET["template_ID"] . "</script>";
        } else {
            $browseCV = new BrowseCVController();
            $browseCV->render();
        }
        $editCV->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::GET('/searchCV', function () {
    $priService = new PriviledgeService();
    if($priService->isVIP()){
        $searchCV = new SearchCVController();
        $searchCV->render();
    }
    else{
        $upgradeVIP = new UpgradeVipController();
        $upgradeVIP->render();
    }
});

Router::GET('/upgrade', function () {
    $upgradeVIP = new UpgradeVipController();
    $upgradeVIP->render();
});

Router::POST('/upgrade', function () {
    $upgradeVIP = new UpgradeVipController();
    if($upgradeVIP->upgradeVIP()){
        $home = new HomeController();
        $home->render();
    }
    else{
        $upgradeVIP->render();
    }
    
});

Router::GET('/browseCV', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $browseCV = new BrowseCVController();
        $browseCV->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::GET('/testdb', function () {
    $testdb = new TestdbController();
    $testdb->render();
});

Router::GET('/cv', function () {
    $previewCV = new PreviewCVController();
    echo $previewCV->getCV($_GET["CV_ID"]);
});

Router::GET('/template', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $testdb = new TemplateController();
        $testdb->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::GET('/template2', function () {
    $priService = new PriviledgeService();
    if ($priService->isLogin()) {
        $testdb = new TemplateController2();
        $testdb->render();
    } else {
        $login = new LoginController();
        $login->render();
    }
});

Router::POST('/login-authen', function () {
    $authenService = new AuthenService();
    echo $authenService->signin($_POST["mail"], $_POST["password"]);
});

Router::POST('/register-authen', function () {
    $authenService = new AuthenService();
    echo $authenService->signup($_POST["mail"], $_POST["password"], $_POST["password2"]);
});

Router::POST('/logout-authen', function () {
    $authenService = new AuthenService();
    $authenService->signout();
});

Router::POST('/editCV', function () {
    $editCVController = new EditCVController();
    if (isset($_POST["CV_ID"])) {
        echo $editCVController->editCV();
    } else {
        echo $editCVController->submitCV();
    }
});
$action = $_SERVER['REQUEST_URI'];
$action = str_replace("web-assignment/", "", $action);
Router::dispatch($action);

<?php
require_once __DIR__."/router.php";

/*
*   require View
*/
require_once __DIR__."/views/layouts/home.php";
require_once __DIR__."/views/layouts/login.php";

/*
* require Controllers
*/

require_once __DIR__."/controllers/login.php";

define("ROOT_DIR","web-assignment");

route('/', function () {
    $viewHome = new Home();
    $viewHome->render();
});

route('/login', function () {
    $login = new LoginController();
    $login->render();
});

route('/authentication', function () {
    $login = new LoginController();
    $login->handleLogin();
});

$action = $_SERVER['REQUEST_URI'];
$action = str_replace("web-assignment/", "",$action);
dispatch($action);
?>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='/browser-sync/browser-sync-client.js?v=2.17.5'><\/script>".replace("HOST", location.hostname));
//]]>
</script>


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
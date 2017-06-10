<?php
//判断php版本
if (version_compare(PHP_VERSION, '5.6.0', '<')) die('require PHP > 5.6.0 !');
//定义根目录
define('APP_ROOT', dirname(__DIR__));
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, -10));
//定义时区
date_default_timezone_set('Asia/Shanghai');
//加载第三方组件库
require  APP_ROOT .'/../vendor/autoload.php';

//初始化路由类
$router = new AltoRouter();
//
////首页
//$router->map( 'GET', '/', function() {
//    require APP_ROOT . '/views/index.latte';
//});
//// map user details page
//$router->map( 'GET', '/user/[i:id]/', 'UserController#showDetails');
//// match current request url
//$match = $router->match();
//
//// call closure or throw 404 status
//if( $match && is_callable( $match['target'] ) ) {
//    call_user_func_array( $match['target'], $match['params'] );
//} else {
//    if(!is_null($match['target'])){
//        list($controllerName, $actionName) = explode("#", $match['target']);
//        $controllerClass = '\app\controllers\\'.$controllerName;
//        $controllerObj = new $controllerClass();
//        if(method_exists($controllerObj, $actionName)){
//            $controllerObj -> $actionName();
//        }
//    }else{
//        echo "Controller or method is not found!";
//    }
//    //header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
//}

// load map routes
//require APP_ROOT . '/config/routes.php';
//添加默认路由规则
$router->map('GET|POST', '/[a:controllerName]/[a:actionName]', function ($controllerName, $actionName) {
    runAction($controllerName, $actionName, []);
});

$router->map('GET|POST', '/[a:controllerName]/[a:actionName]/?[**:]', function ($controllerName, $actionName) {
    $args = explode('/', $_SERVER['REQUEST_URI']);
    $args = array_slice($args, 3);
    runAction($controllerName, $actionName, $args);
});


$match = $router->match();

// no route was matched
if (false === $match) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    exit('URI :' . $_SERVER['REQUEST_URI'] . ' Has No Route Matched!');
}

// call closure or throw 404 status
if (is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    if (false === strpos($match['target'], '@')) {
        exit('Invalid Target :' . $match['target'] . '!');
    }
    list($controllerName, $actionName) = explode('@', $match['target']);
    runAction($controllerName, $actionName, $match['params']);
}

function runAction($controllerName, $actionName, $args)
{
    // echo $controllerName;
    $controllerClass = '\app\controllers\\' . ucfirst($controllerName) . 'Controller';
    if (!class_exists($controllerClass)) {
        exit($controllerName . ' Class Not Found!');
    }
    $controller = new $controllerClass();
    if (method_exists($controller, $actionName)) {
        $controller->$actionName(...$args);
    } else {
        exit($actionName . ' Action Not Found!');
    }
}
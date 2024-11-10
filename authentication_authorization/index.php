<?php
// index.php - Front Controller
require_once "./vendor/autoload.php";
require_once 'config.php';
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

// Remove the script name from the URL to get the route
$route = str_replace($scriptName, '', $requestUri);
$route = trim($route, '/');


// Define simple routing
switch ($route) {
    case '':
        $controller = new \App\Controllers\AuthController(new \App\Models\User($pdo));
        $controller->login("faisal","1234");
        break;
    case 'about':
        $controller = new \App\Controllers\AboutController();
        $controller->index();
        break;
    default:
        echo "404 - Page Not Found";
}

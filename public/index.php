<?php

session_start();

// Basic Router
$uri = trim($_SERVER['REQUEST_URI'], '/');
$method = $_SERVER['REQUEST_METHOD'];

require_once '../app/core/Autoload.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';
require_once '../app/core/Database.php';
require_once '../app/controllers/UserController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/models/User.php';
require_once '../app/models/Admin.php';

use App\Controllers\UserController;
use App\Controllers\AuthController;

$userController = new UserController();
$authController = new AuthController();

// User routes
if ($uri === '' && $method === 'GET') {
    $userController->index();
} elseif ($uri === 'create' && $method === 'GET') {
    $userController->create();
} elseif ($uri === 'store' && $method === 'POST') {
    $userController->store();
} elseif (preg_match('/edit\/(\d+)/', $uri, $matches) && $method === 'GET') {
    $userController->edit($matches[1]);
} elseif (preg_match('/update\/(\d+)/', $uri, $matches) && $method === 'POST') {
    $userController->update($matches[1]);
} elseif (preg_match('/delete\/(\d+)/', $uri, $matches) && $method === 'POST') {
    $userController->delete($matches[1]);

// Authentication routes
} elseif ($uri === 'login' && $method === 'GET') {
    $authController->login();
} elseif ($uri === 'login' && $method === 'POST') {
    $authController->login();
} elseif ($uri === 'register' && $method === 'GET') {
    $authController->register();
} elseif ($uri === 'register' && $method === 'POST') {
    $authController->register();
} elseif ($uri === 'logout' && $method === 'GET') {
    $authController->logout();

// 404 handler
} else {
    http_response_code(404);
    echo "Page not found.";
}


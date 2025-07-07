<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

$controller = new AuthController();

$action = $_GET['action'] ?? 'register';

switch ($action) {
    case 'register':
        $controller->register();
        break;  
    case 'login':
        $controller->login();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}

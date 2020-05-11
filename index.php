<?php
require_once __DIR__.'/vendor/autoload.php';

use app\controllers\HomeController;
use app\Router;
use app\Request;

$route = new Router(new Request());
$route->get('/', 'home');
$route->get('/about', 'about');
$route->get('/contact', [HomeController::class, 'contact']);
$route->post('/contact', [HomeController::class, 'postContact']);

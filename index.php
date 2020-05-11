<?php
require_once __DIR__.'/Router.php';
require_once __DIR__.'/Request.php';
require_once __DIR__.'/controllers/HomeController.php';




$request = new Request();
$route = new Router($request);
$route->get('/', 'home');
$route->get('/about', 'about');
$route->get('/contact', [HomeController::class, 'contact']);
$route->post('/contact', [HomeController::class, 'postContact']);

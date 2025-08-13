<?php

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';
// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->setNamespace('\App\Controllers');
$router->get('(\d+)', 'App/Views/error.php');

// Run it!
$router->run();
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Response;

$router = new Router([
    'paths' => [
        'controllers' => __DIR__ . '/../App/Controllers',
    ],
    'namespaces' => [
        'controllers' => 'App\Controllers',
    ],
]);

$router->get('', 'AccueilController@index');

$router->run();
?>
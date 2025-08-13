<?php

/*
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER ['HTTPS'])){
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
*/
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
$prefixUrl = '/Klaxon-correction/';
$url = $_SERVER['REQUEST_URI'];

if ($url == $prefixUrl.'') {

    require '../App/Controllers/AccueilController.php';
} 

if ($url == $prefixUrl.'session') {

    require '../App/Core/Session.php';
}

if ($url == $prefixUrl.'logout') {

    require '../App/Controllers/AccueilController.php';
} 

if ($url == $prefixUrl.'addTrajet') {

    require '../App/Controllers/TrajetsController.php';
}

/*
$request = $_SERVER['REQUEST_URI'];
$viewDir = '/../App/Views/';
switch ($request) {

    case '/':
        require __DIR__ . $viewDir . 'accueil.php';
        break;

    case '/App/Core/session.php':
        require __DIR__ . $viewDir . 'usersPage.php';
        break;
    }


*/
/*
require_once __DIR__ . '/../vendor/autoload.php';

use Buki\Router\Router;

$router = new Router([
    'paths' => [
        'controllers' => __DIR__ . '/../App/Controllers',
    ],
    'namespaces' => [
        'controllers' => 'App\Controllers',
    ],
]);

$router->get('', 'PagesController@index');

$router->run();
*/
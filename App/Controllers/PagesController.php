<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\TrajetsModel;


class PagesController {

    public function index(){

        $trajet = new TrajetsModel;
        $result = $trajet->getTrajets();
        require __DIR__.'/../Views/accueil.php'; 
    }
}
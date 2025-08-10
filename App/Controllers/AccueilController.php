<?php
/*
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\TrajetsModel;
class AccueilController
{
    public function index()
    {
        // Load the TrajetsModel and get the trajet data
        $trajet = new TrajetsModel();
        $result = $trajet->getTrajets();

        // Render the accueil view with the trajet data
        require __DIR__ . '/../Views/accueil.php';
    }
} */
use App\Models\TrajetsModel;

    require_once __DIR__ . '/../../vendor/autoload.php';
    $trajet = new TrajetsModel;
    $result = $trajet->getTrajets();
    require __DIR__.'/../Views/accueil.php';

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
use App\Controllers\AgencesController;
use App\Controllers\UsersController;

    $trajet = new TrajetsModel;
    $result = $trajet->getTrajets();

    $agences = new AgencesController();
    $agence = $agences->getAgences();

    $users = new UsersController();
    $user = $users->getUsers();

    require __DIR__.'/../Views/adminsPage.php';


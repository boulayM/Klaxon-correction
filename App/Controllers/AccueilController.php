<?php
use App\Models\TrajetsModel;

require_once __DIR__ . '/../../vendor/autoload.php';
    $trajet = new TrajetsModel;
    $result = $trajet->getTrajets();
    require ('../App/Views/accueil.php');

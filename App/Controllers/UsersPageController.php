<?php
use App\Models\TrajetsModel;

    $trajet = new TrajetsModel;
    $result = $trajet->getTrajets();
    require __DIR__.'/../Views/usersPage.php';

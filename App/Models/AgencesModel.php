<?php
namespace App\Models;
require_once __DIR__ . '/../../vendor/autoload.php';


class AgencesModel {

public function getAgences() {
require __DIR__.'/../Core/Database.php';
$agences = $pdo->query('SELECT * FROM agences ORDER BY ville ASC');
return $agences;
require __DIR__.'/../Views/Partials/listeVilles.php';

    }
}
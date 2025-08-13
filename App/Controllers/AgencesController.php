<?php

require __DIR__.'/../Core/Database.php';

$agences = $pdo->query('SELECT * FROM agences ORDER BY ville ASC');
$agence = $agences->fetchAll();
return $agence;
require __DIR__.'/../Views/Partials/listeVilles.php';
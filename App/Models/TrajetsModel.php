<?php
namespace App\Models;
use App\Controllers\TrajetsController;
require_once __DIR__ . '/../../vendor/autoload.php';


class TrajetsModel {

public function getTrajets() {
$trajets = new TrajetsController;
$result = $trajets->findAll(
    
    "SELECT 
    trajets.id,
    DATE_FORMAT(date_depart, '%d/%m/%Y') AS date_depart, 
    heure_depart,
    DATE_FORMAT(date_arrivee, '%d/%m/%Y') AS date_arrivee, 
    heure_arrivee,
    places_dispo,
    nbr_places,
    users.nom AS nom,
    users.prenom AS prenom,
    users.email AS email,
    users.telephone AS tel,
    depart.ville AS depart, 
    arrivee.ville AS arrivee 
    FROM trajets 
    JOIN agences AS depart ON trajets.depart = depart.id 
    JOIN agences AS arrivee ON trajets.arrivee = arrivee.id 
    JOIN users ON trajets.contact = users.id
    WHERE date_depart >= NOW() AND places_dispo > 0 
    ORDER BY date_depart ASC");

return $result;

}

public function addTrajet() {
require __DIR__.'/TrajetsData.php';
$trajets = new TrajetsController;
$trajetAdd = $trajets->add(
    "INSERT INTO trajets 
    (depart, arrivee, date_depart, heure_depart, date_arrivee, heure_arrivee, nbr_places, places_dispo, contact) 
    VALUES ('$depart', '$arrivee', '$date_depart', '$heure_depart', '$date_arrivee', '$heure_arrivee', 
    '$nbr_places', '$places_dispo', '$contact')"
);
return $trajetAdd;
}
/*

function updateTrajet() {

    require './Models/TrajetsData.php';


    return update (
    "UPDATE trajets SET 
    depart = '$depart', date_depart = '$date_depart', heure_depart = '$heure_depart', 
    arrivee = '$arrivee', date_arrivee = '$date_arrivee', heure_arrivee = '$heure_arrivee',
    nbr_places = '$nbr_places', places_dispo = '$places_dispo'  WHERE id = '$id'"
    );
}*/
}
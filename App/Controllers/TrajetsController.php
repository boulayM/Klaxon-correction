<?php
/**
 * TrajetsController.php
 * 
 * This controller handles the management of trajets, including adding, updating, and deleting trajets.
 * It interacts with the TrajetsModel to perform database operations.
 */
namespace App\Controllers;

use App\Core\Database;
use App\Controllers\FlashMessage;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $addTrajet = new TrajetsController();
    if ($action === 'add') {
        $addTrajet->add();
    }
    elseif ($action === 'update') {
        $addTrajet->update();
    }
    elseif ($action === 'delete') {
        $addTrajet->delete();
    }
}


class TrajetsController {
/**
 * Find all trajets
 * @param string $stmt
 * @return array
 * 
 */

    
public function findAll($stmt) {

$db = Database::getInstance()->getConnection();
$trajets = $db->query($stmt);
$result = $trajets->fetchAll();
return $result;

}
/**
 * Add a new trajet
 * @param string $depart
 * @param string $arrivee
 * @param string $date_depart
 * @param string $heure_depart
 * @param string $date_arrivee
 * @param string $heure_arrivee
 * @param int $nbr_places
 * @param int $places_dispo
 * @param string $contact
 * * @return void
 * 
 */
public function add() {

require __DIR__.'/../Models/TrajetsData.php';
$db = Database::getInstance()->getConnection();


if ($depart == $arrivee or $date_depart > $date_arrivee OR $heure_depart > $heure_arrivee 
OR $nbr_places < 1 or $places_dispo < 1 or $places_dispo > $nbr_places) {

    FlashMessage::set('error', 'Inconsistances dans les données du trajet. Veuillez vérifier les informations saisies.');
    require __DIR__.'/UsersController.php';

    exit();
}
    $stmt = $db->prepare("INSERT INTO trajets 
    (depart, arrivee, date_depart, heure_depart, date_arrivee, heure_arrivee, nbr_places, places_dispo, contact) 
    VALUES (:depart, :arrivee, :date_depart, :heure_depart, :date_arrivee, :heure_arrivee, :nbr_places, :places_dispo, :contact)");

    $stmt->bindParam(':depart', $depart);
    $stmt->bindParam(':arrivee', $arrivee);
    $stmt->bindParam(':date_depart', $date_depart);
    $stmt->bindParam(':heure_depart', $heure_depart);
    $stmt->bindParam(':date_arrivee', $date_arrivee);
    $stmt->bindParam(':heure_arrivee', $heure_arrivee);
    $stmt->bindParam(':nbr_places', $nbr_places);
    $stmt->bindParam(':places_dispo', $places_dispo);
    $stmt->bindParam(':contact', $contact);
    $stmt->execute();

    FlashMessage::set('success', 'Trajet ajouté avec succés!');
    require __DIR__.'/UsersController.php';
    exit;

}

/**
 * Update a trajet
 * @param string $stmt
 * @return void
 * 
 */

public function update() {
require __DIR__.'/FlashMessage.php';
require __DIR__.'/../Models/TrajetsData.php';
$db = Database::getInstance()->getConnection();

$id = $_POST['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) 
{
    $stmt = $db->prepare("UPDATE trajets SET 
    depart = '$depart', date_depart = '$date_depart', heure_depart = '$heure_depart', 
    arrivee = '$arrivee', date_arrivee = '$date_arrivee', heure_arrivee = '$heure_arrivee',
    nbr_places = '$nbr_places', places_dispo = '$places_dispo'  WHERE id = '$id'");
    }
    

if ($stmt->execute()) {
        FlashMessage::set('success', 'Trajet modifié avec succès!');
        require __DIR__.'/UsersController.php';
        exit;
    } else {
        FlashMessage::set('error', 'Erreur lors de la modification du trajet.');
        require __DIR__.'/UsersController.php';
        exit;
    }
}

/**
 * Delete a trajet
 * @return void
 * 
 */

public function delete() {
session_start();
$db = Database::getInstance()->getConnection();



    $id = $_POST['id']; // Sécuriser l'entrée

    // Requête de suppression
    $stmt = $db->prepare("DELETE FROM trajets WHERE id = :id");
    $stmt->bindParam(":id", $id, \PDO::PARAM_INT);

    // Exécute la requête pour supprimer le trajet
    if ($stmt->execute()) {
        FlashMessage::set('success', 'Trajet supprimé avec succès!');
        require __DIR__.'/UsersController.php';
        exit;

    } else {
        FlashMessage::set('error', 'Erreur lors de la suppression du trajet.');
        require __DIR__.'/UsersController.php';
        exit;
    }

}


}
?>
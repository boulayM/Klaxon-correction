<?php
namespace App\Controllers;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $addTrajet = new TrajetsController();
    if ($action === 'add') {
        $addTrajet->add();
    }
}

class TrajetsController {
public function findAll($stmt) {

require __DIR__.'/../Core/Database.php';

$trajets = $pdo->query($stmt);
$result = $trajets->fetchAll();
return $result;

}

public function add() {

session_start();
require __DIR__.'/../Core/Database.php';

    $contact = $_SESSION['user_id'];
    $depart = $_POST['depart'];
    $arrivee = $_POST['arrivee'];
    $date_depart = $_POST['date_depart'];
    $heure_depart = $_POST['heure_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $heure_arrivee = $_POST['heure_arrivee'];
    $nbr_places = $_POST['nbr_places'];
    $places_dispo = $_POST['places_dispo'];

if ($depart == $arrivee or $date_depart > $date_arrivee OR $heure_depart > $heure_arrivee 
OR $nbr_places < 1 or $places_dispo < 1 or $places_dispo > $nbr_places) {

    require __DIR__.'/UsersController.php';

    exit();
}
    $stmt = $pdo->prepare("INSERT INTO trajets 
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
  require __DIR__.'/UsersController.php';
          exit;

}

function update($stmt) {
session_start();
require '../Core/Database.php';
require './Controllers/FlashMessageController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) 
{
    $trajets = $pdo->query($stmt);
    $result = $trajets->execute();
    if ($trajets->execute()) {
        return $result;
        exit;
        } else {
        header('Location: '.$uri.'/Klaxon-correction/views/usersPage.php');
    }
    }
}
    


function delete() {

session_start();
require '../Core/Database.php';
require './Controllers/FlashMessageController.php';

if (isset($_POST['supprimer'])) {
    $id = intval($_POST['id']); // Sécuriser l'entrée

    // Requête de suppression
    $stmt = $conn->prepare("DELETE FROM trajets WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        exit;
    } else {
        echo "Erreur lors de la suppression.";
    }
}
}

}

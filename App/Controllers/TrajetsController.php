<?php
namespace App\Controllers;

class TrajetsController {
function findAll($stmt) {

require __DIR__.'/../Core/Database.php';

$trajets = $pdo->query($stmt);
$result = $trajets->fetchAll();
return $result;

}

function add() {

session_start();
require '../Core/Database.php';
require './Controllers/FlashMessageController.php';


$trajets = $pdo->query($stmt);
$result = $trajets->execute();

if ($depart == $arrivee or $date_depart > $date_arrivee OR $heure_depart > $heure_arrivee 
OR $nbr_places < 1 or $places_dispo < 1 or $places_dispo > $nbr_places) {

    return $result;
    setFlashMessage("Données inconsistentes, veuillez vérifier vos données");
    header('Location: '.$uri.'/Klaxon-correction/views/usersPage.php');

    exit();
}
if ($conn->query($sql) === TRUE) {
  setFlashMessage("Trajet crée avec succés!");

} else {
  setFlashMessage("Il y a eu une erreur lors du traitement de vos données.");

}



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
        setFlashMessage("Trajet modifié avec succés!");
        header('Location: '.$uri.'/Klaxon-correction/views/usersPage.php');
        return $result;
        exit;
        } else {
        setFlashMessage("Erreur lors de la modification!" . $conn->error);
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
        setFlashMessage("Trajet supprimé avec succés!");
        header('Location: '.$uri.'/Klaxon-correction/views/usersPage.php');
        exit;
    } else {
        echo "Erreur lors de la suppression.";
    }
}
}

}

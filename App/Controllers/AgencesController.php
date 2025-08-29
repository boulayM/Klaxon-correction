<?php

namespace App\Controllers;
use App\Core\Database;
use App\Controllers\FlashMessage;

$id = $_POST['id'] ?? null;
$ville = $_POST['ville'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $agenceCrud = new AgencesController();
    if ($action === 'addAgence') {
        $agenceCrud->addAgence($ville);
    }
    elseif ($action === 'updateAgence') {
        $agenceCrud->updateAgence($id, $ville);
    }
    elseif ($action === 'deleteAgence') {
        $agenceCrud->deleteAgence($id);
    }
}


class AgencesController {

    public static function getAgences() {
    $pdo = Database::getInstance()->getConnection();
    $agences = $pdo->query('SELECT * FROM agences ORDER BY ville ASC');
    $agence = $agences->fetchAll();
    return $agence;
    }

    public static function updateAgence($id, $ville) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('UPDATE agences SET ville = :ville WHERE id = :id');
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':id', $id);
if ($stmt->execute()) {
        FlashMessage::set('success', 'Agence modifiée avec succès!');
        require __DIR__.'/AdminsController.php';
    } else {
        FlashMessage::set('error', "Erreur lors de la modification de l'agence");
        require __DIR__.'/AdminsController.php';
    }
}

    

    public static function deleteAgence($id) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('DELETE FROM agences WHERE id = :id');
        $stmt->bindParam(':id', $id);
        if  ($stmt->execute()) {
        FlashMessage::set('success', 'Agence supprimée avec succès!');
        require __DIR__.'/AdminsController.php';
        }

}

    public static function addAgence($ville) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('INSERT INTO agences (ville) VALUES (:ville)');
        $stmt->bindParam(':ville', $ville);
        if  ($stmt->execute()) {
        FlashMessage::set('success', 'Agence ajoutée avec succès!');
        require __DIR__.'/AdminsController.php';
        }

    }
}

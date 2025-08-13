<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\TrajetsController;
require_once __DIR__.'/../vendor/autoload.php';

class TrajetsTest extends TestCase {

    public function testGetTrajets() {

        $trajetsModel = new \App\Models\TrajetsModel();
        $resultat = $trajetsModel->getTrajets();
        $this->assertIsArray($resultat);
        
    }

    public function testAddTrajet() {

        $trajetsController = new TrajetsController();
        $_POST['depart'] = 1;
        $_POST['arrivee'] = 2;
        $_POST['date_depart'] = '2033-10-01';
        $_POST['heure_depart'] = '10:00';
        $_POST['date_arrivee'] = '2033-10-01';
        $_POST['heure_arrivee'] = '12:00';
        $_POST['nbr_places'] = 4;
        $_POST['places_dispo'] = 4;
        $_POST['action'] = 'add';
        $_POST['contact'] = 1; // Assuming user_id is 1 for the test
        $trajetsController->add();
        $this->assertTrue(isset($_SESSION['flash_message']));
    
        $this->assertEquals('Trajet ajouté avec succès.', $_SESSION['flash_message']);
        unset($_SESSION['flash_message']);
    
    }

        

}
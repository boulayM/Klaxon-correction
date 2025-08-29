<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\TrajetsController;
use App\Models\TrajetsModel;
require_once __DIR__.'/../vendor/autoload.php';

class TrajetsTest extends TestCase {

    /**
     * Test to check if the findAll method returns an array
     */

    public function testFindAll() {
        
        $result = TrajetsModel::getTrajets();
        $this->assertIsArray($result);
    } 
    /**
     * Test to check if the add method works correctly
     * This test assumes that the database is set up correctly and the user_id is 1
     */

    public function testAdd() {

        
        $depart = 1; // Assuming depart ID is 1
        $arrivee = 2; // Assuming arrivee ID is 2
        $date_depart = '2033-10-01';
        $heure_depart = '10:00';
        $date_arrivee = '2033-10-01';
        $heure_arrivee = '12:00';
        $nbr_places = 4;
        $places_dispo = 4;
        $contact = 1; // Assuming user_id is 1 for the test

        $trajetsController = new TrajetsController();
        $trajetsController->add();

        $this->assertTrue(isset($_SESSION['flash_message']));
        $this->assertEquals('Trajet ajouté avec succès.', $_SESSION['flash_message']);
        unset($_SESSION['flash_message']);  
    }
    }




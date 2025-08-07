<?php

use PHPUnit\Framework\TestCase;

class TrajetsTest extends TestCase {

    public function testGetTrajets() {

        $trajetsModel = new \App\Models\TrajetsModel();
        $resultat = $trajetsModel->getTrajets();
        $this->assertIsArray($resultat);
        
    }
}
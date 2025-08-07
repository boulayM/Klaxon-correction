<?php

/**
 * 
 * CONTROLEUR DE GENERATION DE MESSAGES FLASH
 * 
 * Fonction pour définir des messages Flash
 * Fonction pour afficher les messages Flash
 * 
 */

function setFlashMessage($message, $type = 'info') {
    $_SESSION['flash_message'] = [
        'message' => $message,
        'type' => $type
    ];
}


function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message']['message'];
        $type = $_SESSION['flash_message']['type'];

        echo "<div class='flash-message flash-{$type}'>{$message}</div>";

        unset($_SESSION['flash_message']);
    }
}
?>
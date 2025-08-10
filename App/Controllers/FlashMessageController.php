<?php

namespace App\Controllers;

class FlashMessageController {


/**
 * 
 * CONTROLEUR DE GENERATION DE MESSAGES FLASH
 * 
 * Fonction pour définir des messages Flash
 * Fonction pour afficher les messages Flash
 * 
 */

public static function setFlashMessage($message, $type = 'info') {
    $_SESSION['flash_message'] = [
        'message' => $message,
        'type' => $type
    ];
}


public static function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message']['message'];
        $type = $_SESSION['flash_message']['type'];

        echo "<div class='flash-message flash-{$type}'>{$message}</div>";

        // Clear the message after displaying it
}
}

public static function clearFlashMessage() {
    unset($_SESSION['flash_message']);
}

}
?>
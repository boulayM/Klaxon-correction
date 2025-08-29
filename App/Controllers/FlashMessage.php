<?php
namespace App\Controllers;

class FlashMessage {
    public static function set($key, $message) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]); // Supprime le message après récupération
            return $message;
        }
        return null;
    }
    public static function clear() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION['flash']);
    }
}
?>
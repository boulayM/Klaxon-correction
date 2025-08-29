<?php

namespace App\Controllers;
use App\Core\Database;

class UsersController {

    public static function getUsers() {
    $pdo = Database::getInstance()->getConnection();
    $users = $pdo->query('SELECT * FROM users');
    $user = $users->fetchAll();
    return $user;
    require __DIR__.'/../Views/adminsPage.php';
    }
}

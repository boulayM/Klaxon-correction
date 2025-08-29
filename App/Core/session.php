<?php
namespace App\Core;
// Démarre la session
use App\Core\Database;
use PDO;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $login = new Session();
    if ($action === 'login') {
        $login->Login();
    }
}


class Session {
    
    public function Login() {

    $db = Database::getInstance()->getConnection();
    $email = $_POST['email'];
    $password = $_POST['keypass'];
    
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user['email'] == $email && $user['password'] == $password && $user['role'] === "user") {

        $_SESSION['user_data'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_telephone'] = $user['telephone'];
        $_SESSION['user_role'] = $user['role'];

        require __DIR__.'/../Controllers/UsersPageController.php';
        exit();

    } 
    if ($user ['email'] == $email && $user ['password'] == $password && $user ['role'] === "admin") {

        $_SESSION['user_data'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_role'] = $user['role'];

        require __DIR__.'/../Controllers/AdminsController.php';

    }
    
    else {
        echo "Identifiants incorrects.";
        require '../Views/erreur.php';
    }

    }
}



?>

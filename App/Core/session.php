<?php
session_start();
require __DIR__.'/../Core/Database.php';
require __DIR__.'/../Controllers/FlashMessageController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['keypass'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user ['email'] == $email && $user ['password'] == $password && $user ['role'] === "user") {

        $_SESSION['user_data'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_telephone'] = $user['telephone'];
        require __DIR__.'/../Controllers/UsersController.php';
        exit();

    } 
    if ($user ['email'] == $email && $user ['password'] == $password && $user ['role'] === "admin") {

        $_SESSION['user_data'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];
        require __DIR__.'/../Views/adminsPage.php';

    }
    
    else {
        echo "Identifiants incorrects.";
    }
}
?>

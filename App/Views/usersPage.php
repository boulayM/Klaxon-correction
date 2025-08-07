<?php 
/**
 * 
 * HTML contenant la page d'accueil des utilisateurs connectés
 * Requiert le controlleur permettant d'afficher des messages Flash
 * Inclue la fonction permettant d'afficher les messages Flash
 * 
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOUCHE PAS AU KLAXON</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/CSS/style.css">
</head>
<header>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-brand">TOUCHE PAS AU KLAXON</div>
            <div class="nav justify-content-end me-4">
                <button class="btn btn-success btn-lg me-3" data-bs-toggle="modal" data-bs-target="#creerTrajet">
                    Créer un trajet
                </button>
                <?php //include './modals/addTrajet.php' ?>
                <div class="align-content-center">                   
                    <?php if (isset($_SESSION['user_data']) && $_SESSION['user_data']): ?>
                        <span class="text-white me-3">Bienvenue, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
                    <?php endif; ?>
                </div>
                <button class="btn btn-danger btn-lg">
                    <a href="../Core/logout.php" class="text-white" style="text-decoration: none">Déconnexion</a>
                </button>
            </div>
        </div>
    </nav>
</header>
<body>    
    <h5 class="ms-3 mt-3"><?php displayFlashMessage();?></h5>
    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Départ</th>
                    <th>Date de départ</th>
                    <th>Heure</th>
                    <th>Arrivée</th>
                    <th>Heure</th>
                    <th>Date d'arrivée</th>
                    <th>Auteur</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $trajet):?>
                <tr>
                    <td><?php echo htmlspecialchars($trajet['depart']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['date_depart']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['heure_depart']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['arrivee']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['heure_arrivee']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['date_arrivee']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['nom']) . " " . htmlspecialchars($trajet['prenom']); ?></td>
                    <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($trajet['email']); ?>infos"><i class="bi bi-eye"></i></td>
                    <?php if (isset($_SESSION['user_data']) && $_SESSION['user_data'] && $trajet['email'] === $_SESSION['user_email']): ?>
                    <td>
                        <form action="/appKlaxon/templates/updateTrajet.php" method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($trajet['id']); ?>">
                            <button type="submit" name="modifier" style="border: none;"><i class="bi bi-pencil-square"></i></button>
                        </form> 
                    </td>
                    <td>
                        <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($trajet['id']); ?>supprimer"><i class="bi bi-trash3"></i></td>
                    </td>
            <?php endif;?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
  </div>
</body>
    <?php include __DIR__.'/Partials/footer.php'?>
</html>
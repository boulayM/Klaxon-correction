<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOUCHE PAS AU KLAXON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="public/CSS/style.css">
</head>
<header>
    <nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-brand">TOUCHE PAS AU KLAXON</div>
            <div class="nav justify-content-end me-4">
                <button class="btn btn-light me-2"><a class="nav-link" id="usersButton">Liste des utilisateurs</a></button>
                <button class="btn btn-light me-2"><a class="nav-link" id="agencesButton">Liste des agences</a></button>
                <button class="btn btn-light me-2"><a class="nav-link" id="trajetsButton">Liste des trajets</a></button>
                <div class="align-content-center ms-2 me-2">                   
                    <?php if (isset($_SESSION['user_data']) && $_SESSION['user_data']): ?>
                        <span class="text-white me-3">Bienvenue, <?php echo htmlspecialchars($_SESSION['user_prenom'] ." ". $_SESSION['user_name']); ?>!</span>
                    <?php endif; ?>
                </div>
                <button class="btn btn-danger">
                    <a class="nav-link text-white" href="logout">Déconnexion</a>
                </button>
            </div>
        </div>
    </div>
    </nav>
</header>
<body>
<?php use App\Controllers\FlashMessage; ?>
<?php 
$message = FlashMessage::get('success');
if ($message): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>
<?php
$message = FlashMessage::get('error');
if ($message): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($message) ?>  
    </div>
<?php endif; ?>

    <!--
    ***********************************
    ***********************************
    *       Liste des trajets         *
    ***********************************
    ***********************************
    -->
    <style>
    #trajets {
      display: none; /* Initially hidden */
    }
  </style>
    <div class="container mt-5" id="trajets">
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
                            <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($trajet['email']); ?>supprimer"><i class="bi bi-trash3"></i></td>
                        </tr>
<!--
    ***********************************
    * Modale pour supprimer un trajet *
    ***********************************
-->
<div class="modal fade" id="<?php echo htmlspecialchars($trajet['email']); ?>supprimer" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-danger" id="infosLabel">ATTENTION!</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="deleteTrajet" class="form-control">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($trajet['trajet_id']); ?>">
                    <input type="hidden" name="action" value="delete">
                    <div class="p-3">
                        <h5><strong>VOULEZ-VOUS VRAIMENT SUPPRIMER CE TRAJET?</strong></h5>
                    </div>
                    <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </form>
            </div>
        </div>
    </div>
</div>    

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!--
    ***********************************
    ***********************************
    *       Liste des agences         *
    ***********************************
    ***********************************
    -->
    <style>
    #agences {
      display: none; /* Initially hidden */
    }
    </style>


    <div class="container mt-5" id="agences">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id de l'agence</th>
                    <th>Nom de l'agence</th>
                    <th><button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target= "#addAgence">Ajouter une agence</button></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agence as $ville): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($ville['id']); ?></td>
                        <td><?php echo htmlspecialchars($ville['ville']); ?></td>
                        <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($ville['id']); ?>mod"><i class="bi bi-pencil-square"></i></td>
                        <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($ville['id']); ?>sup"><i class="bi bi-trash3"></i></td>
                    </tr>

    <!--
    ***********************************
      Modale pour ajouter une agence
    ***********************************
    -->
    <div class="modal fade" id="addAgence" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="infosLabel">Ajouter une agence</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="addAgence" class="form-control">
                        <input type="hidden" name="action" value="addAgence">
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--
    ***********************************
      Modale pour supprimer une agence
    ***********************************
    -->
    <div class="modal fade" id="<?php echo htmlspecialchars($ville['id']); ?>sup" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-danger" id="infosLabel">ATTENTION!</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="deleteAgence" class="form-control">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($ville['id']); ?>">
                        <input type="hidden" name="action" value="deleteAgence">
                        <div class="p-3">
                            <h5><strong>VOULEZ-VOUS VRAIMENT SUPPRIMER CETTE AGENCE?</strong></h5>
                        </div>
                        <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--
    ***********************************
      Modale pour modifier une agence
    ***********************************
    -->
    <div class="modal fade" id="<?php echo htmlspecialchars($ville['id']); ?>mod" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="infosLabel">Modifier l'agence</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="updateAgence" class="form-control">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($ville['id']); ?>">
                        <input type="hidden" name="action" value="updateAgence">
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--
    ***********************************
    ***********************************
    *       Liste des utilisateurs         *
    ***********************************
    ***********************************
    -->
<style>
    #users {
      display: none; /* Initially hidden */
    }
    </style>

    <div class="container mt-5" id="users">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['nom']); ?></td>
                        <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['telephone']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<?php include __DIR__.'/Partials/footer.php'; ?>
<script src = 'public/Scripts/admin.js'></script>
</html>
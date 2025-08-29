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
                <div class="align-content-center">                   
                    <?php if (isset($_SESSION['user_data']) && $_SESSION['user_data']): ?>
                        <span class="text-white me-3">Bienvenue, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
                    <?php endif; ?>
                </div>
                <button class="btn btn-danger btn-lg">
                    <a href="/Klaxon-correction/logout" class="text-white" style="text-decoration: none">Déconnexion</a>
                </button>
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
                    <?php if ($trajet['email'] === $_SESSION['user_email']): ?>
                    <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($trajet['email']); ?>modifier"><i class="bi bi-pencil-square"></i></td>
                    <td data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($trajet['email']); ?>supprimer"><i class="bi bi-trash3"></i></td>
            <?php endif;?>
                </tr>
<!--
*******************************
Modal pour afficher les informations du trajet
*******************************
-->

<div class="modal fade" id="<?php echo htmlspecialchars($trajet['email']); ?>infos" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infosLabel">Informations du trajet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Auteur:</strong> <?php echo htmlspecialchars($trajet['nom']) . " " . htmlspecialchars($trajet['prenom']); ?></p>
                <p><strong>Téléphone:</strong> <?php echo htmlspecialchars($trajet['tel']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($trajet['email']); ?></p>
                <p><strong>Nombre total de places:</strong> <?php echo htmlspecialchars($trajet['nbr_places']); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- 
******************************  
Modal pour supprimer le trajet
****************************** 
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
<!-- 
*******************************
Modal pour modifier le trajet 
*******************************
-->
<div class="modal fade" id="<?php echo htmlspecialchars($trajet['email']); ?>modifier" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infosLabel">Modifier le trajet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="updateTrajet" method="post" class="form-control">

                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($trajet['trajet_id']); ?>">
                        <input type="hidden" name="action" value="update">
                        <label class="form-label" for="depart">Ville de départ</label>
                        <div class="form-group">
                            <select name = "depart" required>
                                <?php include __DIR__.'/Partials/listeVilles.php'; ?>
                            </select>
                        </div>
                        <label class="form-label" for="dateDepart">Date du départ</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="date" name="date_depart" id="dateDepart" required>
                        </div>

                        <label class="form-label" for="dateDepart">Heure du départ</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="time" name="heure_depart" id="dateDepart" required>
                        </div>

                        <label class="form-label" for="arrivee">Ville d'arrivée</label>
                        <div class="form-group">
                            
                            <select name = "arrivee" required>
                                <?php include __DIR__.'/Partials/listeVilles.php'; ?>
                            </select>


                        </div>

                        <label class="form-label" for="dateArrivee">Date d'arrivée</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="date" name="date_arrivee" id="dateArrivee" required>
                        </div>

                        <label class="form-label" for="dateDepart">Heure d'arrivée</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="time" name="heure_arrivee" id="dateDepart" required>
                        </div>

                        <label class="form-label" for="nbr_places">Nombre de places</label>
                        <div class="form-group">
                            <input class="form-input" type="number" name="nbr_places" id="nbr_places" required>
                        </div>

                        <label class="form-label" for="places_dispo">Places disponibles</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="number" name="places_dispo" id="places_dispo" required>
                        </div><br>
                    </fieldset>
                        <button class="btn btn-primary" type="submit" name="modifier">Modifier</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </form>
            </div>
        </div>
    </div>

<!--
*******************************
Modal pour créer un trajet
*******************************
-->

</div><div class="modal fade" id="creerTrajet" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infosLabel">Créer un trajet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="addTrajet" method="post" class="form-control">
                    <fieldset>
                        <legend>Informations du trajet</legend>
                        <input type="hidden" name="action" value="add">
                        <label class="form-label" for="email">Email</label><br>
                            <input class="text-secondary" type="text" name="email" id="email" value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>" readonly><br>
                            <label class="form-label" for="nom">Nom</label><br>
                            <input class="text-secondary" type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" readonly><br>
                            <label class="form-label" for="prenom">Prénom</label><br>
                            <input class="text-secondary" type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($_SESSION['user_prenom']); ?>" readonly><br>
                            <label class="form-label" for="telephone">Téléphone</label><br>
                            <input class="text-secondary" type="text" name="telephone" id="telephone" value="<?php echo htmlspecialchars($_SESSION['user_telephone']); ?>"readonly><br>
                        <label class="form-label" for="depart">Ville de départ</label>
                        <div class="form-group">                            
                            <select name = "depart" required>
                                <?php  include __DIR__.'/Partials/listeVilles.php'; ?>
                            </select>
                        </div>
                        <label class="form-label" for="dateDepart">Date du départ</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="date" name="date_depart" id="dateDepart" required>
                        </div>
                        <label class="form-label" for="dateDepart">Heure du départ</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="time" name="heure_depart" id="heureDepart" required>
                        </div>
                        <label class="form-label" for="arrivee">Ville d'arrivée</label>
                        <div class="form-group">                            
                            <select name = "arrivee" required>
                                <?php include __DIR__. '/Partials/listeVilles.php'; ?>
                            </select>
                        </div>
                        <label class="form-label" for="dateArrivee">Date d'arrivée</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="date" name="date_arrivee" id="dateArrivee" required>
                        </div>
                        <label class="form-label" for="dateDepart">Heure d'arrivée'</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="time" name="heure_arrivee" id="heureArrivee" required>
                        </div>
                        <label class="form-label" for="nbr_places">Nombre de places</label>
                        <div class="form-group">
                            <input class="form-input" type="number" name="nbr_places" id="nbr_places" required>
                        </div>
                        <label class="form-label" for="places_dispo">Places disponibles</label>
                        <div class="form-group mar-bot-5">
                            <input class="form-input" type="number" name="places_dispo" id="places_dispo" required>
                        </div><br> 
                        <button class="btn btn-primary" type="submit">Créer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>                      
                    </fieldset>
                </form>                    
            </div>
        </div>
    </div>
</div>
            <?php endforeach; ?>
            </tbody>
        </table>
  </div>
</body>
    <?php include __DIR__.'/Partials/footer.php'?>
</html>
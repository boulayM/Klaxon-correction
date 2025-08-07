<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOUCHE PAS AU KLAXON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/style.css">
</head>
<header>
    <nav class="navbar">
  <div class="container-fluid">
    <div>
    <a class="navbar-brand">TOUCHE PAS AU KLAXON</a>
  </div>
  <div class="nav justify-content-end me-4">
    <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#loggin">
      Loggin
    </button>
  </div>
  </div>
</nav>
</header>
<body>
  <h3 class="ms-3 mt-3">POUR OBTENIR PLUS D'INFORMATIONS SUR UN TRAJET, VEUILLEZ VOUS CONNECTER.</h3>
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
                           
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
  </div>

</body>
  <?php require __DIR__.'/../Views/Partials/loggin.php'; ?>
  <?php include __DIR__. '/Partials/footer.php';?>
</html>
    <?php

    /**
     * 
     * HTML contanat la barre de navigation des utilisateurs connectés
     * Démarre la session pour avoir accés aux données des utilisateurs
     * Inclue la modale contenat le formulaire pour l'ajout d'un nouveau trajet
     * Vérifie si l'utilisateur est connecté et affiche un message de bienvennue avec son prénom et son nom
     * 
     */ 
    ?>
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
                        <span class="me-3">Bienvenue, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
                    <?php endif; ?>
                </div>
                <button class="btn btn-danger btn-lg">
                    <a href="../Core/logout.php" class="text-white" style="text-decoration: none">Déconnexion</a>
                </button>
            </div>
        </div>
    </nav>

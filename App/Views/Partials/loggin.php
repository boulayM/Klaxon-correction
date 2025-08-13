<?php
/**
 * 
 * Modale contenant le formulaire pour procéder au login d'un utilisateur
 * 
 */
?>

<div class="modal fade" id="loggin" tabindex="-1" aria-labelledby="infosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infosLabel">Veuillez entrer vos identifiants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="session" method="post" class="form-control">

            <fieldset>
                <input type="hidden" name="action" value="login">
                <label class="form-label" for="username">Votre e-mail</label>
                <div class="form-group">
                    <input class="form-input" type="text" name="email" placeholder="email" id="username" required>
                </div>

                <label class="form-label" for="password">Votre mot de passe</label>
                <div class="form-group mar-bot-5">
                    <input class="form-input" type="password" name="keypass" placeholder="mot de passe" id="keypass" required>
                </div><br>

                <button class="btn btn-primary" type="submit">Login</button>

            </fieldset>

            </form>
            </div>
        </div>
    </div>
</div>

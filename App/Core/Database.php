
<?php


        //CHARGE LE FICHIEER AVEC LES INFORMATIONS POUR LA CONNECTION
        $env = require __DIR__.'/../../Config/env.php';
        try  {
            //CRÉATION DE L'OBJET PDO

            $pdo = new PDO(
                    'mysql:host='.$env['db_host'].';dbname='.$env['db_name'].';charset=utf8',
                    $env['db_user'],
                    $env['db_pass']);
            

            //CONFIGURATION DES OPTIONS D'ERREUR PDO

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
        } catch(PDOException $e) {

            //GESTION DES ERREURS
            require '../Views/erreur.php';
            echo 'Erreur de connexion: '.$e->getMessage();


        }
    
?>
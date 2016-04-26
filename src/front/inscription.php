<!DOCTYPE html>
<?php
//Démarrage de la session
session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="description" content="Texte de description">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="">
    <!-- <link rel="stylesheet" href="css/styles.css" media="all">	-->
    <style>
        fieldset {width: 42%;}
    </style>
</head>
<body>
<div id="page">
    <header></header>


    <?php

    //Connexion à la base de données
    require_once('../../entity/connexion_db.php');

    //Initialisation du message d'erreur
    $message_erreur = '';

    // On teste si le formulaire d'ajout d'utilisateur est rempli
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])) {

            //On stocke les données de $_POST
            $login = $_POST['login'];
            $civ=$_POST['civ'];
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $password=$_POST['password'];
            $password2=$_POST['password2'];
            $mail=$_POST['mail'];
            $datenaiss=$_POST['datenaiss'];

            //Vérification si l'identifiant existe déjà
            $requete=$db->query("SELECT * FROM utilisateur WHERE login='$login'");
            $user = $requete->fetch();

            //Vérification si le mail existe déjà
            $requete2=$db->query("SELECT * FROM utilisateur WHERE mail_usr='$mail'");
            $user2 = $requete2->fetch();

            if ($user){
                $message_erreur = "L'identifiant choisi existe déjà ! Veuillez en choisir un autre.";
            }

            elseif ($user2){
                $message_erreur = "Le mail choisi existe déjà ! Veuillez en choisir un autre.";
            }

            elseif($password!=$password2){
                $message_erreur = "Les deux mots de passe ne correspondent pas !";
            }
            else {

                try {
                    // Hachage du mot de passe
                    $hash=password_hash($password,PASSWORD_DEFAULT);

                    // Ajout de l'utilisateur dans la base


                    $requete=$db->exec("INSERT INTO utilisateur (nom_usr,prenom_usr,mail_usr,civilite_usr,date_naiss_usr,login,password) VALUES ('".$nom."','".$prenom."','".$mail."','".$civ."','".$datenaiss."','".$login."','".$hash."')");
                    echo 'compte ajouté';
                }
                catch(Exception $ex){

                    echo 'erreur lors de l\'ajout de compte' .$ex->getMessage();
                }

             }

        }

    ?>

    <!-- Formulaire -->
    <div id="Création_compte">
        <h2>Créer un compte utilisateur</h2>
        <p>Tous les champs sont obligatoires</p>

        <?php

        // Affichage du message d'erreur
        if(!empty($message_erreur)){
            echo $message_erreur;
        }
        ?>
        <form method="post" action="">
            <table>
                <tr>
                    <td><label for="case">Monsieur</label></td>
                    <td><input type="radio" name="civ" id="case" /></td>
                </tr>

                <tr>
                    <td><label for="case">Madame</label></td>
                    <td><input type="radio" name="civ" id="case" /></td>

                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" name="login" placeholder="Identifiant" size="25" required></td>
                </tr>

                <tr>
                    <td><label for="prenom_utilisateur">Prenom</label></td>
                    <td><input type="text" name="prenom" placeholder="Prenom" size="25" required></td>
                </tr>

                <tr>
                    <td><label for="nom_utilisateur">Nom</label></td>
                    <td><input type="text" name="nom" placeholder="Nom" size="25" required></td>
                </tr>

                <tr>
                    <td><label for="mail_utilisateur">E-mail</label></td>
                    <td><input type="text" name="mail" placeholder="eMail" size="25" ></td>
                </tr>

                <tr>
                    <td><label for="datenaiss_utilisateur">Date de naissance</label></td>
                    <td><input type="text" name="datenaiss" placeholder="JJ/MM/AAAA" size="25" ></td>
                </tr>

                <tr>
                    <td><label for="password">Mot de passe</label></td>
                    <td><input type="password" name="password" placeholder="Mot de passe" size="25" required></td>
                </tr>

                <tr>
                    <td><label for="password2">Ressaisissez votre mot de passe</label></td>
                    <td><input type="password" name="password2" placeholder="Vérification" size="25" required></td>
                </tr>

                <tr id="cellule_bouton" style="float:right; margin-top: 10%;">
                    <td>
                        <a href="index.php" title="Annuler la création de compte"><input type="submit"  value="Annuler"  ></a>
                        <a href="accueil.php" title="Valider"><input type="submit" name="valider" class="bouton_submit" value="Créer"></a></td>
                </tr>
            </table>
        </form>
        </fieldset>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<?php
//Démarrage de la session
session_start();
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Inscription - Aerolines</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--  <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../../css/aero.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<?php include('navbar.php'); ?>

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
                    $utilisateur = new utilisateur($nom,$prenom,$mail,$civ,$datenaiss,$login,$hash);

                    $utilisateur->addUtilisateur($nom,$prenom,$mail,$civ,$datenaiss,$login,$hash);

                    $idusr = $bdd->query("SELECT id_usr FROM utilisateur WHERE login ='".$utilisateur->getLogin()."'");
                    $id = $idusr->fetch();
                    $bdd->exec("INSERT INTO client(id_usr) VALUES (".$id["id_usr"].");");
                    echo 'compte ajouté';
                }
                catch(Exception $ex){

                    echo 'erreur lors de l\'ajout de compte' .$ex->getMessage();
                }

             }

        }

    ?>

<div class="container marketing">

    <!-- Formulaire -->
    <div id="Création_compte" class="inscr-div">
        <h2>Créer un compte utilisateur</h2>
        <p>Tous les champs sont obligatoires</p>

        <?php

        // Affichage du message d'erreur
        if(!empty($message_erreur)){
            echo $message_erreur;
        }
        ?>
        <form method="post" action="">
            <table class="table inscr-table">

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
                    <td><label for="case">Civilité</label></td>
                    <td><label for="case">M</label>
                        <input type="radio" name="civ" id="case" value="Homme" />
                        <label for="case" style="margin-left: 30px;">Mme</label>
                        <input type="radio" name="civ" id="case" value="femme"/></td>
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

                <tr id="cellule_bouton">
                    <td style="padding-top: 25px;">
                        <input type="submit"  value="Annuler"  >
                    </td>
                    <td style="padding-top: 25px;">
                        <input type="submit" name="valider" class="bouton_submit" value="Créer">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- FOOTER -->
    <footer>
        <!-- <p class="pull-right"><a href="#"><img class="pull-arrow" src="img/1564-1626-thickbox.jpg" alt="Pull arrow"></a></p> -->
        <p>&copy; 2016 ROSSIGNOL - MORENO - BARDEL &middot;</p>
    </footer>

</div><!-- /.container -->

</body>
</html>
<?php
if(!empty($_POST['login']) && !empty($_POST['password']) )
{
    require_once('../../Entity/connexion_db.php');
    $bdd = connexion_db::getInstance();


    $reponse_login = $bdd->query('SELECT login FROM utilisateur');
    $reponse_password = $bdd->query('SELECT password FROM utilisateur');
    $IsAuthentified = false;

    while ($donnees = $reponse_login->fetch() AND $donees2 = $reponse_password->fetch())
    {
        if ($_POST['login'] == $donnees['login'] AND password_verify($_POST['password'],$donees2['password']))
        {
            $get_id = $bdd->query('SELECT id_usr FROM utilisateur WHERE login = "'.$_POST['login'].'"');
            $id = $get_id->fetch();
            $isadmin = $bdd->query('SELECT id_usr FROM admin WHERE id_usr = "'.$id['id_usr'].'"');

            if($isadmin->fetch() != null){
                $IsAuthentified = true;
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['admin'] = true;
                $_SESSION['ID'] = $id["id_usr"];
                header('location: ../admin/admin.php');
                exit();
            }

            else {
                $IsAuthentified = true;
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['admin'] = false;
                $_SESSION['ID'] = $id["id_usr"];
                header('location: ../');
                exit();
            }

        }
    }

    if(!$IsAuthentified){
        //print_r($bdd->errorInfo());
        echo"<span style=\"color: red\">Mauvais login ou mauvais mot de passe</span>";
    }

}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/aero.css">
    <meta charset="UTF-8">

    <title>Title</title>
</head>
<body>
<?php include('navbar.php'); ?>
<div class="container marketing">

    <!-- Formulaire -->
    <div id="Création_compte" class="inscr-div">
        <h2>Se connecter</h2>

        <form method="post" action="">
            <table class="table inscr-table">

                <tr><td><input type="text" placeholder="Login" name="login" class="form-control" required autofocus></td></tr>
                <tr><td><input type="password" placeholder="Password" name="password" class="form-control" required></td></tr>
                <tr><td><button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Connexion</button></td></tr>
                <tr><td><a class="btn btn-lg btn-primary btn-block" id="button-login" href="inscription.php">Créer un compte</a></td></tr>

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
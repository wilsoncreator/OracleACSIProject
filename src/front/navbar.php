
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/OracleACSIProject/src/index.php">AEROLines</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">


                                <?php
                                if(empty($_SESSION["ID"])|| !isset($_SESSION["ID"])){
                                    echo("
                                        <li><a href=\"/OracleACSIProject/src/front/recherche-vol.php\">Recherche avancée</a></li>
                                        <li ><a href=\"/OracleACSIProject/src/front/connection.php\">Se connecter</a></li>
                                    ");
                                }
                                else {

                                    echo("
                            <li><a href=\"/OracleACSIProject/src/front/recherche-vol.php\">Recherche avancée</a></li>
                                <li><a href=\"/OracleACSIProject/src/front/UserDetail.php\">Mes informations</a></li>
                                <li><a href=\"/OracleACSIProject/src/front/mes-reservations.php?\">Mes commandes</a></li>


                        </li>
                        <li ><a href=\"/OracleACSIProject/src/front/deconnection.php\">Se déconnecter</a></li>
                    ");
                                    if($_SESSION["admin"] == true){
                                        echo("<li ><a href=\"/OracleACSIProject/src/admin/admin.php\">Interface admin</a></li>");
                                    }

                                }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


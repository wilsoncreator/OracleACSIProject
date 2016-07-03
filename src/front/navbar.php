
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
                    <a class="navbar-brand" href="/OracleACSIProject/src">AEROLines</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">


                                <?php
                                if(empty($_SESSION["ID"])|| !isset($_SESSION["ID"])){
                                    echo("<li ><a href=\"/OracleACSIProject/src/front/connection.php\">Se connecter</a></li>");
                                }
                                else {
                                    echo("<li class=\"dropdown\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Mon compte<span class=\"caret\"></span></a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"#\">Mes informations</a></li>
                                <li><a href=\"#\">Mes commandes</a></li>

                            </ul>
                        </li>
                        <li ><a href=\"/OracleACSIProject/src/front/deconnection.php\">Se déconnecter</a></li>
                    </ul>");

                                }
                        ?>

                </div>
            </div>
        </nav>

    </div>
</div>

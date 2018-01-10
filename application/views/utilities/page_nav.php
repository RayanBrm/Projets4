<div class="navbar-fixed">
    <nav>

        <div class="nav-wrapper">
            <a href="accueil" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <?php
                    if (isset($env) && $env == 'nonlog'){
                        echo '<li><a href="'.base_url()."connexion".'"><i class="material-icons left">person_outline</i>Connexion</a></li>';
                    }
                    else if (isset($env) && $env == 'log'){
                        echo '<li><a href="main/disconnect"><i class="material-icons left">person</i>Déconnexion</a></li>';
                        echo '<li><a href="connexionEleve"><i class="material-icons left">person</i>Connexion élève</a></li>';
                        echo '<li><a href="bibliotheque"><i class="material-icons left">person</i>Bibliothèque</a></li>';
                        echo '<li><a href="utilisateur"><i class="material-icons left">person</i>Utilisateur</a></li>';
                        echo '<li><a href="historique"><i class="material-icons left">person</i>Historique</a></li>';
                    }
                    else if(isset($env) && $env == 'child'){
                        echo 'Child environnement';
                    }
                    else{
                        echo 'Error : unset environnement';
                    }
                ?>
            </ul>
        </div>
    </nav>
</div>
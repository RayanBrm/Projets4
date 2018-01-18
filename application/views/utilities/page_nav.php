<div class="navbar-fixed ">
    <nav>

        <div class="nav-wrapper red lighten-3">
            <a href="accueil" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <?php
                if (isset($env) && $env == 'nonlog'){
                    echo '<li><a href="'.base_url()."connexion".'"><i class="material-icons left">person_outline</i>Connexion</a></li>';
                }
                else if (isset($env) && $env == 'log'){
                    echo '<li><a href="main/disconnect"><i class="material-icons left">highlight_off</i>Déconnexion</a></li>';
                    echo '<li><a href="connexionEleve"><i class="material-icons left">child_care</i>Connexion élève</a></li>';
                    echo '<li><a href="bibliotheque"><i class="material-icons left">library_books</i>Bibliothèque</a></li>';
                    echo '<li><a href="utilisateur"><i class="material-icons left">person</i>Utilisateur</a></li>';
                    echo '<li><a href="historique"><i class="material-icons left">history</i>Historique</a></li>';
                }
                else if(isset($env) && $env == 'child'){

                    echo 'child env';
                }
                else if(isset($env) && $env == 'childlog'){

                    echo "<span class='icon'>".'Bébé connecté : '.$_SESSION['child']['prenom']."</span>";
                    echo '<img class=\'icon\' src=\''.base_url().'assets/img/pastilles_eleve/'.$_SESSION["child"]["pastille"].'.png\' >';
                    echo '<li><a class="icon" href="disconnect"><i class="material-icons right">highlight_off</i>Déconnexion</a></li>';
                }
                else{
                    echo 'Error : unset environnement';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>
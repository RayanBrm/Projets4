<?php
 $bagde = ($outdated)? '<i class="material-icons right">info</i>' : '';
 $pulse = ($outdated)? 'pulsar' : '';
?>
<div class="navbar-fixed ">
    <nav>
        <div class="nav-wrapper red lighten-3">
            <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Retour à l'accueil !" href="accueil" class="brand-logo"><img style="width:55px; margin-top: 5px; margin-left: 5px;"src="<?=base_url()?>assets/img/book.png"></a>
            <ul class="right hide-on-med-and-down">
                <?php
                if (isset($env) && $env == 'nonlog'){
                    echo '<li><a href="'.base_url()."connexion".'"><i class="material-icons left">person_outline</i>Connexion</a></li>';
                }
                else if (isset($env) && $env == 'log'){
                    echo '<li><a href="main/disconnect"><i class="material-icons left">highlight_off</i>Déconnexion</a></li>';
                    echo '<li><a href="connexionEleve"><i class="material-icons left">child_care</i>Connexion élève</a></li>';
                    echo '<li><a href="historique" class="'.$pulse.'"><i class="material-icons left">history</i>Historique'.$bagde.'</a></li>';
                    echo '<li><a href="administration"><i class="material-icons left">settings</i>Administration</a></li>';
                }
                else if(isset($env) && $env == 'childlog'){

                    echo "<span class='icon'>".'Bébé connecté : '.$_SESSION['child']['prenom']."</span>";
                    echo '<img class=\'icon\' src=\''.base_url().'assets/img/pastilles_eleve/'.$_SESSION["child"]["pastille"].'.png\' >';
                    echo '<li><a class="icon" href="child/disconnect"><i class="material-icons right">highlight_off</i>Déconnexion</a></li>';
                }else if(isset($env) && $env == 'test'){

                }else{
                    echo 'Error : unset environnement';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>
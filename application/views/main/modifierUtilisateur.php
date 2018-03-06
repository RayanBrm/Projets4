<?php
$data['title'] = 'Modifier - '.$user['identifiant'];
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

<div class="container">
    <h2>Modifier <?= $user['identifiant'] ?></h2>

    <div class="row">
        <div class="col s8 offset-s1">
            <label for="identifiant">Identifiant</label>
            <input type="text" id="identifiant" value="<?= $user['identifiant'] ?>" disabled>
            <label for="prenom">Identifiant</label>
            <input type="text" id="prenom" value="<?= $user['prenom'] ?>">
            <label for="nom">Identifiant</label>
            <input type="text" id="nom" value="<?= $user['nom'] ?>">
<?php
    if ($user['role'] == "3"){
?>
            <div class="row">
                <input type="text" title="" id="current_classe" hidden value="<?= $user['classe'] ?>">
                <div class="col s6">
                    <label for="classe_container">Classe</label>
                    <select id="classe_container">
                        <?= $classList ?>
                    </select>
                </div>
                <div class="col s6">
                    <input type="text" title="" id="current_pastille" hidden value="<?= $user['pastille'] ?>">
                    <label for="pastille_container">Classe</label>
                    <select id="pastille_container">
                        <?= $pastilles ?>
                    </select>
                </div>
            </div>
<?php
    } elseif ($user['role'] == "1" || $user['role'] == "2"){ // personnel case
?>
            <label for="motdepasse">Nouveau mot de passe</label>
            <input type="password" id="motdepasse">
<?php
    }
?>
            <div class="row col s6">
                <div class="col s6">
                    <a class="waves-effect waves-light btn tooltipped" href="javascript:history.back()" data-position="bottom" data-delay="50" data-tooltip="Annuler les changements et revenir."><i class="material-icons left">cancel</i>annuler</a>
                </div>
                <div class="col s6">
                    <a id="valider" class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Valider les changements."><i class="material-icons left">check</i>valider</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$data['load'] = array('jquery.min','materialize.min','modifuser');
$this->load->view('utilities/page_footer',$data);
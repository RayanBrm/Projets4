<?php
$data['title'] = 'Modifier - '.$book['titre'];
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);

// TODO : autocomplete theme; Theme principale;
// TODO GLOBALS : ajout autocomplete editeur
?>

    <div class="container">
        <h2>Modifier un livre : <?= $book['titre'] ?></h2>
        <div class="row">
            <div class="col s8 offset-s1">
                <input id="id" title="" type="text" value="<?= $book['id'] ?>" hidden>
                <label for="isbn">ISBN</label>
                <input id="isbn" type="text" value="<?= $book['isbn'] ?>" disabled>
                <label for="titre">Titre</label>
                <input id="titre" type="text" value="<?= $book['titre'] ?>">
                <label for="auteur">Auteur</label>
                <input id="auteur" type="text" class="autocomplete" value="<?= $book['auteur'] ?>">
                <label for="editeur">Editeur</label>
                <input id="editeur" type="text" class="autocomplete" value="<?= $book['edition'] ?>">
                <div class="row">
                    <div class="col s6">
                        <label for="main_theme">Themes principaux</label>
                        <select id="main_theme" class="icons" onchange="themeFilter()">
                            <option id="main_default" value="" selected disabled>Themes</option>
                        </select>
                    </div>
                    <div class="col s6">
                        <label for="secondary_theme">Themes secondaires</label>
                        <div id="secondary_theme" class="chips chips-placeholder chips-initial chips-autocomplete"></div>
                    </div>
                </div>
                <div class="row col s6">
                    <div class="col s6">
                        <a class="waves-effect waves-light btn"><i class="material-icons left">cancel</i>annuler</a>
                    </div>
                    <div class="col s6">
                        <a class="waves-effect waves-light btn"><i class="material-icons left">check</i>valider</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$data['load'] = array('jquery.min','materialize.min', 'select', 'chips', 'modiflivres');
$this->load->view('utilities/page_footer',$data);
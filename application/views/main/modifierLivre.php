<?php
$data['title'] = 'Modifier - ' . $book['titre'];
$data['env'] = 'log';
$data['outdated'] = $outdated;
$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);
?>

    <div class="container">
        <h2>Modifier un livre : <?= $book['titre'] ?></h2>
        <div class="row">
            <form id="form" action="#">
                <div class="col s9 offset-s1">
                    <input id="id" name="id" type="text" value="<?= $book['id'] ?>" hidden>
                    <label for="isbn">ISBN</label>
                    <input id="isbn" name="isbn" type="text" value="<?= $book['isbn'] ?>" disabled>
                    <label for="titre">Titre</label>
                    <input id="titre" name="titre" type="text" value="<?= $book['titre'] ?>">
                    <div class="input-field">
                        <label for="description">Résumé</label>
                        <textarea id="description" name="description" class="materialize-textarea"
                                  data-length="500"><?= $book['description'] ?></textarea>
                    </div>
                    <label for="auteur">Auteur</label>
                    <input id="auteur" name="auteur" type="text" class="autocomplete" value="<?= $book['auteur'] ?>">
                    <label for="edition">Editeur</label>
                    <input id="edition" name="edition" type="text" class="autocomplete" value="<?= $book['edition'] ?>">
                    <div class="row">
                        <div class="col s6">
                            <label for="main_theme">Themes principaux</label>
                            <select id="main_theme" class="icons">
                                <option id="main_default" value="" selected disabled>Themes</option>
                                <?= $themeList ?>
                            </select>
                        </div>
                        <div class="col s6">
                            <label for="secondary_theme">Themes secondaires</label>
                            <div id="secondary_theme"
                                 class="chips chips-placeholder chips-initial chips-autocomplete"></div>
                        </div>
                    </div>

                    <div class="col s4">
                        <img src="<?= base_url($book['couverture']) ?>" alt="Ancienne image" id="old"
                             onerror="this.onerror=null;this.src='/assets/img/livres/nf.png'" width="150" height="220">
                        <br>
                        <label for="old">Ancienne image</label>
                    </div>
                    <div class="col s8">
                        <form action="#">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image</span>
                                    <input type="file" name="upfile">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row col s9" style="margin-top: 2%">
                        <div class="col s6">
                            <a class="waves-effect waves-light btn tooltipped" href="javascript:history.back()"
                               data-position="bottom" data-delay="50" data-tooltip="Annuler les changements et revenir."><i
                                        class="material-icons left">cancel</i>annuler</a>
                        </div>
                        <div class="col s6">
                            <a id="valider" class="waves-effect waves-light btn tooltipped" data-position="bottom"
                               data-delay="50" data-tooltip="Valider les changements."><i
                                        class="material-icons left">check</i>valider</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php

$data['load'] = array('jquery.min', 'materialize.min', 'select', 'chips', 'autocomplete', 'modiflivres');
$this->load->view('utilities/page_footer', $data);
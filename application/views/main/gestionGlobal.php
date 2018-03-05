<?php
$data['title'] = 'Gestion global de l\'application';
$data['env'] = 'log';

$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);

$words = array('CISEAUX', 'PAPIER', 'CAILLOUX');
?>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_1"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agree()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

    <div class="container">
        <h1>HAAAN MAMÈNE, JE JOUE <?= $words[array_rand($words)] ?></h1>

        <ul class="collapsible popout" data-collapsible="accordion">
<!--            Ajouter un classe-->
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">create_new_folder</i>Ajouter une classe
                </div>
                <div class="collapsible-body">
                    <div class="input-field col s6">
                        <input id="classe" type="text" class="validate">
                        <label for="classe">Nom de la classe</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="button" name="newClasse" id="newClasse">
                        Enregistrer
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </li>
<!--            Modifier un classe-->
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">edit</i>Modifier une classe
                </div>
                <div class="collapsible-body">
                    <span>
                        <div class="row">
                            <div class="input-field col s12">
                                <i id="search" class="material-icons prefix">search</i>
                                <div id="utilchip" class="chips-placeholder"></div>
                            </div>
                        </div>
                        <ul id="classe_container" class="collection with-header">
                        </ul>
                    </span>
                </div>
            </li>
<!--            Modifier les affectations-->
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">people</i>Modifier les affectations
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <div class="row" id="child_container">
                                <!--                                 TODO : resize-->
                                <?= $childCardList; ?>
                            </div>
                        </div>
                        <div class="col s6">
                            <h5>Classe à affecter :</h5>
                            <form action="#">
                                <ul>
                                    <?= $classeLiList ?>
                                </ul>
                            </form>
                            <br>
                            <button class="btn waves-effect waves-light" type="submit" name="changeClasses"
                                    id="changeClasses">
                                Valider les changements
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

<?php

$data['load'] = array('jquery.min', 'materialize.min', 'chips','gestionglobal');
$this->load->view('utilities/page_footer', $data);

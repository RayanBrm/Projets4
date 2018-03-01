<?php
$data['title'] = 'Gestion global de l\'application';
$data['env'] = 'log';

$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);

$words = array('CISEAUX', 'PAPIER', 'CAILLOUX');


?>

    <div class="container">
        <h1>HAAAN MAMÈNE, JE JOUE <?= $words[array_rand($words)] ?></h1>

        <ul class="collapsible popout" data-collapsible="accordion">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">create_new_folder</i>Ajouter une classe
                </div>
                <div class="collapsible-body">
                    <div class="input-field col s6">
                        <input id="classe" type="text" class="validate">
                        <label for="classe">Nom de la classe</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Enregistrer
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">create</i>Modifier les classe
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <div class="row" id="child_container">
<!--                                 TODO : resize-->
                                <?=  $childCardList; ?>
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

                            <button class="btn waves-effect waves-light" type="submit" name="action" id="changeClasses">
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

$data['load'] = array('jquery.min', 'materialize.min', 'jquery.ui.min', 'nestable', 'gestionglobal');
$this->load->view('utilities/page_footer', $data);

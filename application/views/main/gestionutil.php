<?php

$data['title'] = 'Gestion des utilisateur';
$data['env'] = 'log';

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Ajout d'un utilisateur</h4>
            <p id="popup_container"></p>
        </div>
        <div class="modal-footer">
            <a href="#!" id="popup_button" class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
        </div>
    </div>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header ">
                <i class="material-icons">people</i>Ajouter un utilisateur
            </div>
            <div class="collapsible-body">
                <span>
                    <form>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="identifiant" name="identifiant" type="text" required>
                                <label class="red-text ligthen-2 for=" input_text">Identifiant</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="motdepasse" name="motdepasse" type="text" required>
                                <label class="red-text ligthen-2 for=" input_text">Mot de passe</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="nom" name="nom" type="text" class="validate" required>
                                <label class="red-text ligthen-2 for=" input_text">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="prenom" name="prenom" type="text" class="validate" required>
                                <label class="red-text ligthen-2 for=" input_text">Prenom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <select id="role" name="role" class="red-text lighten-3" required>
                                    <option value="" disabled selected>Role</option>
                                    <option value="1">Administrateur</option>
                                    <option value="2">Professeur</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light red lighten-3" onclick="adduser()" type="button" name="action">Enregistrer
                                <i class="material-icons rigth ">send</i>
                            </button>
                        </div>
                    </form>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header ">
                <i class="material-icons">child_care</i>Ajouter un élève
            </div>
            <div class="collapsible-body">
                <span>
                    <form>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="Nom" type="text">
                                <label class="red-text ligthen-2 for=" input_text">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="Prenom" type="text" class="validate">
                                <label class="red-text ligthen-2 for=" input_text">Prenom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <select>
                                  <option value="" disabled selected>Classe</option>
                                  <option value="1">CP</option>
                                  <option value="2">CE1</option>
                                  <option value="3">CE2</option>
                                </select>
                                <label>Classe</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <button class="btn waves-effect waves-light red lighten-3 " type="submit" name="action">Enregistrer
                                    <i class="material-icons rigth ">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </span>
            </div>
        </li>

    </ul>
</div>

<?php
    $data['load'] = array('ajax','jquery.min','materialize.min','select','gestionutil');
    $this->load->view('utilities/page_footer',$data);
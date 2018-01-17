<?php
$data['title'] = 'Historique';
$data['env'] = 'log';
$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);

?>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Attention!</h4>
        <blockquote>La suppression d'un livre est définitive. Etes vous sur de vouloir continuer ?</blockquote>
    </div>
    <div class="modal-footer">
        <a href="agree()" class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
        <a href="disagree()" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
    </div>
</div>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons">add</i>Ajouter livre</div>
            <div class="collapsible-body"><span><form>
                <div class="row">
                <div class="input-field col s6">
                    <input id="ISBN" type="text" data-length="13" maxlength="13">
                    <label class="red-text ligthen-2 for=" input_text">ISBN</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                    <input id="Titre" type="text" class="validate">
                    <label class="red-text ligthen-2 for=" input_text">Titre</label>
                </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="Auteur" type="text" class="validate">
                    <label class="red-text ligthen-2 for=" input_text">Auteur</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate">
                        <label class="red-text ligthen-2 for=" input_text">Edition</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="datepicker">
                        <label class="red-text ligthen-2 for=" input_text">Parution</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" data-length="500  "></textarea>
                        <label class="red-text ligthen-2 for=" input_text">Résumé</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="file-field input-field ">
                            <div class="btn red lighten-3">
                                <span>Image</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                 <button class="btn waves-effect waves-light red lighten-3 " type="submit" name="action">Submit
                 <i class="material-icons rigth ">send</i>
                </button>

                    </form>
                </span>


            </fieldset>
            </form></span>
</div>
</li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">library_books</i>
                Modifier/Supprimer un livre
            </div>
            <div class="collapsible-body">
                <span>
                    <div class="row">
                        <div id="catalogue_container" class="input-field col s12">
                            <i id="search" class="material-icons prefix">search</i>
                            <div class="chips-placeholder"></div>
                        </div>
                    </div>
                    <ul id="book_container" class="collection with-header">
                    </ul>
                </span>
            </div>
        </li>

    </ul>
</div>



<?php

$data['load'] = array('jquery.min','materialize.min','ajax','chips','datepicker','gestionbu');
$this->load->view('utilities/page_footer', $data); ?>

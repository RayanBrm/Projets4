<?php
$data['title'] = 'Historique';
$data['env'] = 'log';
$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);

?>

<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Attention!</h4>
        <p>La suppression d'un livre est définitive. Etes vous sur de vouloir continuer ?</p>
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
                    <input id="ISBN" type="text" data-length="13">
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
    <div class="collapsible-header"><i class="material-icons">library_books</i>Modifier/Supprimer un livre</div>
    <div class="collapsible-body"><span>
             <div class="row">
                <div id="catalogue_container" class="input-field col s12">
                    <i id="search" class="material-icons prefix">search</i>
                    <div class="chips-placeholder"></div>
                </div>
            </div>
             <ul id="book_container" class="collection with-header">
<!--                <li class="collection-item"><div>Harry Potter<a href="#!" class="secondary-content"><i class="material-icons red-text lighten-2"">edit</i></a><a href="#!" class="secondary-content red-text lighten-2""><i class="material-icons">clear</i></a></div></li>-->
<!--                <li class="collection-item"><div>Tintin<a href="#!" class="secondary-content"><i class="material-icons red-text lighten-2"">edit</i></a><a href="#!" class="secondary-content red-text lighten-2""><i class="material-icons">clear</i></a></div></li>-->
<!--                <li class="collection-item"><div>Garflied<a href="#!" class="secondary-content"><i class="material-icons red-text lighten-2"">edit</i></a><a href="#!" class="secondary-content red-text lighten-2""><i class="material-icons">clear</i></a></div></li>-->
<!--                <li class="collection-item"><div>Max et Leo<a href="#!" class="secondary-content"><i class="material-icons red-text lighten-2"">edit</i></a><a href="#!" class="secondary-content red-text lighten-2"><i class="material-icons">clear</i></a></div></li>-->
             </ul>

        </span></div>
</li>
<li>
    <div class="collapsible-header "><i class="material-icons">people</i>Ajouter un utilisateur</div>
    <div class="collapsible-body"><span>
    <form>
                <div class="row">
                <div class="input-field col s6">
                    <input id="ISBN" type="text" data-length="13">
                    <label class="red-text ligthen-2 for=" input_text">Identifiant</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                    <input id="Titre" type="text" class="validate">
                    <label class="red-text ligthen-2 for=" input_text">Nom</label>
                </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="Auteur" type="text" class="validate">
                    <label class="red-text ligthen-2 for=" input_text">Prenom</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
    <select class="red-text lighten-3">
      <option value="" disabled selected>Role</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  </div>
                 <button class="btn waves-effect waves-light red lighten-3 " type="submit" name="action">Submit
                 <i class="material-icons rigth ">send</i>
                </button>
                <div class="input-field col s12">
                    </form>
        </span>
</div>
</li>
</ul>


</div>
</div>


<?php
echo includeAJAX();
echo includeJQUERY();
//$data['chips'] = '<script src="' . base_url() . 'assets/js/chips.js" type="text/javascript"></script>';
$data['gestionbu'] = '<script src="' . base_url() . 'assets/js/gestionbu.js" type="text/javascript"></script>';
$data['datepicker'] = '<script src="' . base_url() . 'assets/js/datepicker.js" type="text/javascript"></script>';

$data['load'] = array('jquery.min','materialize.min','ajax','chips','datepicker','gestionbu');
$this->load->view('utilities/page_footer', $data); ?>

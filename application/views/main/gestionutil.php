<?php

$data['title'] = 'Gestion des utilisateur';
$data['env'] = 'log';

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <ul class="collapsible" data-collapsible="accordion">

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

<?php
    $data['load'] = array('jquery.min','materialize.min','');
    $this->load->view('utilities/page_footer',$data);
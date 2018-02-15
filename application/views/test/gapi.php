<?php

$data['title'] = 'apitest';
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);

// TODO : integration
?>

<div class="row s4">
    <h1>Test de l'api google</h1>

    <form id="book_form">
<!--        ISBN-->
        <div class="row">
            <div class="input-field col s3">
                <input name="isbn" id="isbn" type="text" data-length="13" maxlength="13">
                <label class="red-text ligthen-2" for="isbn">ISBN</label>
            </div>
            <div class="input-field col">
                <a class="waves-effect waves-light btn" onclick="test()"><i class="material-icons">loop</i></a>
            </div>
        </div>
<!--        Image path added-->
        <div class="row">
            <div class="col s3">
                <input type="checkbox" id="add-path" onchange="toggleFile()">
                <label for="add-path">Ajouter un fichier local comme couverture</label>
            </div>
        </div>
<!--        Image path-->
        <div class="row">
            <div class="input-field col s6">
                <div id="file-input" class="file-field input-field " hidden>
                    <div class="btn red lighten-3">
                        <span>Image</span>
                        <input name="couverture-local" type="file" id="local-couverture-selector">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" id="local-couverture-name">
                    </div>
                </div>
                <input type="text" name="couverture" id="couverture" hidden>
            </div>
        </div>
<!--        Title-->
        <div class="row">
            <div class="input-field col s12">
                <input name="titre" id="titre" type="text" class="validate">
                <label class="red-text ligthen-2" for="titre">Titre</label>
            </div>
        </div>
<!--        Author-->
        <div class="row">
            <div class="input-field col s12">
                <input name="auteur" id="auteur" type="text" class="validate">
                <label class="red-text ligthen-2" for="auteur">Auteur</label>
            </div>
        </div>
<!--        Editor-->
        <div class="row">
            <div class="input-field col s12">
                <input name="edition" id="edition" type="text" class="validate">
                <label class="red-text ligthen-2" for="edition">Edition</label>
            </div>
        </div>
<!--        Publishing date-->
        <div class="row">
            <div class="input-field col s12">
                <input name="parution" id="parution" type="text" class="datepicker">
                <label class="red-text ligthen-2" for="parution">Parution</label>
            </div>
        </div>
<!--        Description-->
        <div class="row">
            <div class="input-field col s12">
                <textarea name="description" id="description" class="materialize-textarea" data-length="500" maxlength="500"></textarea>
                <label class="red-text ligthen-2" for="description">Résumé</label>
            </div>
        </div>
<!--        Save button-->
        <button class="btn waves-effect waves-light red lighten-3 " type="button" onclick="addBook()" name="save">Enregistrer
            <i class="material-icons rigth ">save</i>
        </button>
    </form>
</div>

    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">textsms</i>
                    <input type="text" id="autocomplete" class="autocomplete">
                    <label for="autocomplete">Autocomplete</label>
                </div>
            </div>
        </div>
    </div>



<?php
 $data['load'] = array('jquery.min','materialize.min','ajax','test/test');
 $this->load->view('utilities/page_footer',$data);


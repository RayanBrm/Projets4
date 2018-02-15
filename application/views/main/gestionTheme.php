<?php
$data['title'] = 'Gestion des themes de l\'application';
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
            <div class="collapsible-header">
                <i class="material-icons">add</i>
                Ajouter un thème
            </div>
            <div class="collapsible-body">
                <form id="book_form">
                    <!--        Theme-->
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="red-text ligthen-2" for="theme">Nom du thème</label>
                            <div id="theme" class="chips chips-autocomplete"></div>
                        </div>
                    </div>
                    <!--        Save button-->
                    <button class="btn waves-effect waves-light red lighten-3 " type="button" onclick="addBook()" name="save">Enregistrer
                        <i class="material-icons rigth ">save</i>
                    </button>
                </form>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">library_books</i>
                Chercher les livres à ajouter au thème
            </div>
            <div class="collapsible-body">
                <!-- première colonne -->
                <div class="input-field col s12 m6">
                <!-- chercher livre -->
                <span>
                    <i id="search" class="material-icons prefix">search</i>
                    <div class="chips-placeholder"></div>
                    <ul id="book_container" class="collection with-header">
                    </ul>
                </span>
                <!-- select livre-->
                    <select class="icons">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="" data-icon="images/sample-1.jpg" class="circle">example 1</option>
                        <option value="" data-icon="images/office.jpg" class="circle">example 2</option>
                        <option value="" data-icon="images/yuna.jpg" class="circle">example 3</option>
                    </select>
                    <label>Images in select</label>
                </div>
                <!-- deuxième colonne -->
                <div class="input-field col s12 m6">
                    <!-- chercher thème -->
                    <span>
                        <i id="search" class="material-icons prefix">search</i>
                        <div class="chips-placeholder"></div>
                        <ul id="book_container" class="collection with-header">
                        </ul>
                    </span>
                    <!-- select thème -->
                    <select class="icons">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="" data-icon="images/sample-1.jpg" class="left circle">example 1</option>
                        <option value="" data-icon="images/office.jpg" class="left circle">example 2</option>
                        <option value="" data-icon="images/yuna.jpg" class="left circle">example 3</option>
                    </select>
                    <label>Images in select</label>
                </div>
            </div>

        </li>
    </ul>
</div>

<?php

$data['load'] = array('ajax','jquery.min','materialize.min','nestable', 'gestiontheme');
$this->load->view('utilities/page_footer',$data);

?>
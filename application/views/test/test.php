<?php
$data['title'] = 'Test interface';
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$data['env'] = 'test';
$this->load->view('utilities/page_nav',$data)
?>

<div class="container">
    <h2>Test interface administration globale</h2>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a href="#util">Gestion utilisateur</a></li>
                <li class="tab col s3"><a href="#eleve">Gestion élève</a></li>
                <li class="tab col s3"><a href="#classe">Gestion des classes</a></li>
                <li class="tab col s3"><a href="#theme">Gestion des thèmes</a></li>
            </ul>
        </div>
        <div id="util" class="col s12">
            <ul class="collapsible" data-collapsible="accordion">
                <!--            User add form-->
                <li>
                    <div class="collapsible-header ">
                        <i class="material-icons">person_add</i>Ajouter un utilisateur
                    </div>
                    <div class="collapsible-body" id="useradd">
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
                            <button class="btn waves-effect waves-light red lighten-3" onclick="add('util')" type="button" name="action">Enregistrer
                                <i class="material-icons rigth ">send</i>
                            </button>
                        </div>
                    </form>
                </span>
                    </div>
                </li>
                <!--            User modify form-->
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">edit</i>Modifier/Supprimer un utilisateur
                    </div>
                    <div class="collapsible-body">
                        <span>
                             <div class="row">
                                <div class="input-field col s12">
                                    <i id="search" class="material-icons prefix">search</i>
                                    <div id="utilchip" class="chips-placeholder"></div>
                                </div>
                            </div>
                            <ul id="util_container" class="collection with-header">
                            </ul>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <div id="eleve" class="col s12">
            <ul class="collapsible" data-collapsible="accordion">
                <!--            Child add form-->
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
                                <select id="Classe">
                                  <option value="" disabled selected>Classe</option>
                                    <?= $classList ?>q
                                </select>
                                <label>Classe</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <button class="btn waves-effect waves-light red lighten-3 " onclick="add('child')" type="button" name="action">Enregistrer
                                    <i class="material-icons rigth ">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </span>
                    </div>
                </li>
                <!--            Child modify form-->
                <li>
                    <div class="collapsible-header"><i class="material-icons">edit</i>Modifier/Supprimer un élève</div>
                    <div class="collapsible-body">
                        <span>
                             <div class="row">
                                <div class="input-field col s12">
                                    <i id="search" class="material-icons prefix">search</i>
                                    <div id="childchip" class="chips-placeholder"></div>
                                </div>
                            </div>
                             <ul id="child_container" class="collection with-header">
                             </ul>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <div id="classe" class="col s12">
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
        <div id="theme" class="col s12">
            <ul class="collapsible" data-collapsible="accordion">
<!--                Ajout-->
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
<!--                Modification-->
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">edit</i>Modifier un thème
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
<!--                Affectations-->
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">library_books</i>
                        Modifier les affectations
                    </div>
                    <div class="collapsible-body">

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php
$data['load'] = array('jquery.min','materialize.min','gestionutil');
$this->load->view('utilities/page_footer',$data);
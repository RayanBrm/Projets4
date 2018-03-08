<?php
$data['title'] = 'Administration';
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_1"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agreeLivre()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_2"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agreeUtil()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_3"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agreeClasse()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

<!-- TODO : refactor, use $this->load->view for each module-->
<div class="container">
    <h2>Administration globale de la bibliothèque</h2>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col"><a href="#livre_menu">Gestion des livres</a></li>
                <li class="tab col"><a href="#util_menu">Gestion utilisateur</a></li>
                <li class="tab col"><a href="#eleve_menu">Gestion élève</a></li>
                <li class="tab col"><a href="#classe_menu">Gestion des classes</a></li>
                <li class="tab col"><a href="#theme_menu">Gestion des thèmes</a></li>
            </ul>
        </div>
<!--        Gestion livre-->
        <div id="livre_menu" class="col s12">
            <ul class="collapsible popout" data-collapsible="accordion">
<!--                Ajout Livre-->
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">add</i>
                        Ajouter livre
                    </div>
                    <div class="collapsible-body">
                        <form id="book_form">
                            <!--        ISBN-->
                            <div class="row">
                                <div class="input-field col s3">
                                    <input name="isbn" id="isbn" type="text" data-length="13" maxlength="13">
                                    <label class="red-text ligthen-2" for="isbn">ISBN</label>
                                </div>
                                <div class="input-field col">
                                    <a class="waves-effect waves-light btn tooltipped" onclick="getByIsbn()" data-position="right" data-delay="50" data-tooltip="Rechercher cet ISBN pour completer le formulaire"><i class="material-icons" id="spinner">loop</i></a>
                                </div>
                            </div>
                            <!--        Image path add-->
                            <div class="row">
                                <div class="col s3">
                                    <input type="checkbox" name="add-path" id="add-path" onchange="toggleFile()">
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
                                    <input name="auteur" id="auteur" type="text" class="validate autocomplete">
                                    <label class="red-text ligthen-2" for="auteur">Auteur</label>
                                </div>
                            </div>
                            <!--        Editor-->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="edition" id="edition" type="text" class="validate autocomplete">
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
                            <!--        Theme-->
                            <div class="row">
                                <div class="input-field col s6">
                                    <select id="mainTheme">
                                        <option value="" disabled selected>Theme principal</option>
                                    </select>
                                    <label for="mainTheme">Theme principal</label>
                                </div>
                                <div class="input-field col s6">
                                    <div id="add_book_theme_chips" class="chips chips-autocomplete">
                                        <input type="text" id="add_book_theme_chips">
                                    </div>
                                    <label class="red-text lighten-2" for="autocomplete">Themes secondaires</label>
                                </div>
                            </div>
                            <!--        Save button-->
                            <a class="btn waves-effect waves-light teal" onclick="addBook()" name="save">Enregistrer<i class="material-icons rigth ">save</i></a>
                        </form>
                    </div>
                </li>
<!--                Modif/Suppr Livre-->
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
                            <div class="chips chips-placeholder" id="book_search_chips"></div>
                        </div>
                    </div>
                    <ul id="book_container" class="collection with-header">
                    </ul>
                </span>
                    </div>
                </li>
            </ul>
        </div>
<!--        Gestion utilisateur-->
        <div id="util_menu" class="col s12">
            <ul class="collapsible popout" data-collapsible="accordion">
                <!--            User add form-->
                <li>
                    <div class="collapsible-header ">
                        <i class="material-icons">person_add</i>Ajouter un utilisateur
                    </div>
                    <div class="collapsible-body" id="useradd">
                <span>
                    <form id="util_add">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="identifiant" name="identifiant" type="text" required>
                                <label class="red-text ligthen-2" for="identifiant">Identifiant</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="motdepasse" name="motdepasse" type="text" required>
                                <label class="red-text ligthen-2" for="motdepasse">Mot de passe</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="util_nom" name="nom" type="text" class="validate" required>
                                <label class="red-text ligthen-2" for="nom">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="util_prenom" name="prenom" type="text" class="validate" required>
                                <label class="red-text ligthen-2" for="prenom">Prenom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <select id="role" name="role" class="red-text lighten-3" required>
                                    <option value="" disabled selected>Role</option>
                                    <option value="1">Administrateur</option>
                                    <option value="2">Professeur</option>
                                </select>
                                <label for="role" class="red-text lighten-3">Rôle</label>
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
                                    <div id="util_search_chips" class="chips chips-placeholder"></div>
                                </div>
                            </div>
                            <ul id="util_container" class="collection with-header">
                            </ul>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
<!--        Gestion eleves-->
        <div id="eleve_menu" class="col s12">
            <ul class="collapsible popout" data-collapsible="accordion">
                <!--            Child add form-->
                <li>
                    <div class="collapsible-header ">
                        <i class="material-icons">child_care</i>Ajouter un élève
                    </div>
                    <div class="collapsible-body">
                <span>
                    <form id="child_add">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="child_nom" type="text">
                                <label class="red-text ligthen-2" for="child_nom">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="child_prenom" type="text" class="validate">
                                <label class="red-text ligthen-2" for="child_prenom">Prenom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <select id="classe">
                                  <option value="" disabled selected>Classe</option>
                                    <?= $classList ?>q
                                </select>
                                <label for="classe">Classe</label>
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
                                    <div id="child_search_chips" class="chips chips-placeholder"></div>
                                </div>
                            </div>
                             <ul id="child_container" class="collection with-header">
                             </ul>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
<!--        Gestion classes-->
        <div id="classe_menu" class="col s12">
            <ul class="collapsible popout" data-collapsible="accordion">
                <!--            Ajouter un classe-->
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">create_new_folder</i>Ajouter une classe
                    </div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="col s8">
                                    <input id="classe_add" type="text" class="validate">
                                    <label for="classe_add">Nom de la classe</label>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="button" name="newClasse" id="newClasse">
                                Enregistrer
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
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
                                <div id="classe_search_chips" class="chips chips-placeholder"></div>
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
<!--        Gestion themes-->
        <div id="theme_menu" class="col s12">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">add</i>
                        Ajouter un thème
                    </div>
                    <div class="collapsible-body">
                        <form id="book_form">
                            <!--        Theme-->
                            <div class="row">
                                <div class="input-field col s6">
                                    <label class="red-text ligthen-2" for="theme">Nom du thème</label>
                                    <input type="text" id="theme">
                                </div>
                                <div class="input-field col s6">
                                    <select id="themeType">
                                        <option value="main_">Theme principal</option>
                                        <option value="" selected>Theme secondaire</option>
                                    </select>
                                    <label for="themeType">Type de theme</label>
                                </div>
                            </div>
                            <!--        Save button-->
                            <button class="btn waves-effect waves-light red lighten-3 " type="button" id="themeBtnAdd" name="save">Enregistrer
                                <i class="material-icons rigth ">save</i>
                            </button>
                        </form>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">library_books</i>
                        Modifier les affectations
                    </div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="input-field col s6">
                                <select id="bookSelector">
                                    <option value="" selected disabled>Choisissez un filtre</option>
                                    <option value="">Tous les livres</option>
                                    <option value="">Par auteur</option>
                                    <option value="">Par titre</option>
                                    <option value="">Par edition</option>
                                </select>
                                <label for="bookSelector">Filtre</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">search</i>
                                <div class="chips" id="theme_filter_chips"></div>
                                <label for="filterField">Filtre</label>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row" style="margin-top: 2%">
                            <div class="col s6">
                                <table class="bordered striped">
                                    <thead>
                                    <tr><th>Titre</th><th>Auteur</th><th>Affecter</th></tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>
                                            <input type="checkbox" id="1"/>
                                            <label for="1">Red</label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s6">
                                <div class="row input-field col s11 offset-s1">
                                    <i class="material-icons prefix">library_books</i>
                                    <div class="chips" id="theme_add_chips"></div>
                                    <label for="filterField">Ajouter des thèmes</label>
                                </div>
                                <div class="row">
                                    <div class="col s6 right-align">
                                        <a class="waves-effect waves-light btn"><i class="material-icons left">cancel</i>Annuler</a>
                                    </div>
                                    <div class="col s6">
                                        <a class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Valider</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php
$data['load'] = array('jquery.min','materialize.min','ajax','autocomplete','administration','gestionbu','gestionutil','gestionglobal','gestiontheme');
$this->load->view('utilities/page_footer',$data);

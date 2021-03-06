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
                            <input type="checkbox" name="add-path" id="add-path" onchange="toggleFile(this)">
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
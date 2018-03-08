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
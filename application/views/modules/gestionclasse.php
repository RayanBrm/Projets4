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
                        <table class="row" id="child_container">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Classe</th>
                                    <th>Selectionner</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $childCardList; ?>
                            </tbody>
                        </table>
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
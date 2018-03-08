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
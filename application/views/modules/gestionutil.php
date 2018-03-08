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
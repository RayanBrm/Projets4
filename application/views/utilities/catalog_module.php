<?php
    if (isset($env) && $env === 'childlog') { // TODO : refactoring for this module part
        echo '<div id="modal1" class="modal">'.
                '<div class="modal-content">'.
                    '<h4>Emprunter un livre</h4>'.
                    '<blockquote>Vous vous appretez a emprunter un livre.<br>Vous aurez 15 jours pour le rendre.</blockquote>'.
                '</div>'.
            '<div class="modal-footer">'.
            '<a href="#" class="modal-action waves-effect waves-green btn-flat" onclick="validateChildLoan('.$_SESSION['child']['id'].')">Valider</a>'.
            '</div>'.
            '</div>';

    }else if(isset($env) && $env !== 'nonlog'){
        // Modal for loan confirmation dialog
        echo '<div id="modal1" class="modal">'.
                '<div class="modal-content">'.
                    '<h4>Emprunter un livre</h4>'.
                    '<blockquote>Vous vous appretez a emprunter un livre.</blockquote>'.
                    '<p>Pour qui souhaitez vous emprunter le livre ?</p>'.
                    '<div class="input-field">'.
                        '<select id="loan_select" onchange="loadClasse(this.value)">'.
                            '<option value="'.$_SESSION['user']['id'].'" selected>Pour moi</option>'.
                            '<option value="0" selected>Pour un élève</option>'.
                        '</select>'.
                    '</div>'.
                    '<div class="input-field hsl" hidden>'.
                        '<select id="class_select" onchange="loadChild(this.value)">'.
                            '<option value="" disabled selected>Classe</option>'.
                        '</select>'.
                    '</div>'.
                    '<div class="input-field hsl" hidden>'.
                        '<select id="child_select">'.
                            '<option value="" disabled selected>Eleve</option>'.
                        '</select>'.
                    '</div>'.
                '</div>'.
                '<div class="modal-footer">'.
                    '<a href="#" class="modal-action waves-effect waves-green btn-flat" onclick="validateLoan()">Valider</a>'.
                '</div>'.
              '</div>';
    }else{
        echo '<div id="modal1" class="modal">'.
                '<div class="modal-content">'.
                    '<h4>Emprunter un livre</h4>'.
                    '<blockquote>Vous devez vous connecter pour pouvoir emprunter un livre</blockquote>'.
                '</div>'.
                '<div class="modal-footer">'.
                    '<a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>'.
                '</div>'.
            '</div>';
    }

    echo '<div class="row">'.
            '<div class="col s3">'.
            '<form class="col s12">'.
                '<div class="row">'.
                    // Left search bar
                    '<div id="catalogue_container" class="input-field col s12">'.
                        '<i id="search" class="material-icons prefix">search</i>'.
                        '<div class="chips-placeholder" onchange="rechercher()"></div>'.
                        '<label>Rechercher un livre</label>'.
                    '</div>';
    // TODO : chain selector ?
    echo            '<div class="input-field col s10 offset-s2">'.
                        '<select id="main_theme_selector" class="icons" onchange="themeFilter(0)">'.
                            '<option value="" disabled selected>Themes principaux</option>'.
                            $mainThemes.
                        '</select>'.
                        '<label>Themes principaux</label>'.
                    '</div>';
    echo            '<div class="input-field col s10 offset-s2">'.
                        '<select id="second_theme_selector" class="icons" onchange="themeFilter(1)">'.
                            '<option value="" disabled selected>Themes secondaires</option>'.
                            $secondaryThemes.
                        '</select>'.
                        '<label>Themes secondaires</label>'.
                    '</div>';
    if (isset($env) && $env == 'childlog') { //affichage pour les enfants
//        echo        '<div class="input-field col s12">'.
//                        '<select class="icons">'.
//                            '<option value="" disabled selected>Themes</option>'.
//                            '<option value="" data-icon="/assets/img/pastilles_theme/fantastique.png" class="circle">theme 1</option>'.
//                            '<option value="" data-icon="/assets/img/pastilles_theme/animaux.png" class="circle">theme 2</option>'.
//                            '<option value="" data-icon="/assets/img/pastilles_theme/mer.png" class="circle">theme 3</option>'.
//                        '</select>'.
//                        '<label>Themes principaux</label>'.
//                     '</div>';
    }

    echo        '</div>'.
           '</form>'.
         '</div>';
    echo '<div class="col s9">';

    // Pagination
    echo    '<ul class="pagination center">'.
                // Navigation icon
                '<li class="waves-effect">'.
                    '<a href="?page=1" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Premiere page"><i class="material-icons">first_page</i></a>'.
                '</li>'.
                '<li class="waves-effect">'.
                    '<a href="?page='.($currentPage-1).'" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Page précédente"><i class="material-icons">chevron_left</i></a>'.
                '</li>'.

                // Current page
                '<li class="active"><a href="#">'.$currentPage.'</a></li>'.

                // Navigation icon
                '<li class="waves-effect">'.
                    '<a href="?page='.($currentPage+1).'" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Page suivante"><i class="material-icons">chevron_right</i></a>'.
                '</li>'.
                '<li class="waves-effect">'.
                    '<a href="?page='.$maxPage.'" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Dernière page"><i class="material-icons">last_page</i></a>'.
                '</li>'.
            '</ul>';
    // End of navigation

    echo    '<div id="book_container" class="container">';
    echo        $books;
    echo    '</div>'.
        '</div>'.
    '</div>';




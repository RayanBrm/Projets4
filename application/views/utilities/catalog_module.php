<?php
    echo '<div class="row">'.
            '<div class="col s3">'.
            '<form class="col s12">'.
                '<div class="row">'.
                    '<div id="catalogue_container" class="input-field col s12">'.
                        '<i id="search" class="material-icons prefix">search</i>'.
                        '<div class="chips-placeholder" onchange="rechercher()"></div>'.
                    '</div>';
    if (isset($env) && $env == 'childlog') { //affichage pour les enfants
        echo
                    '<div id="catalogue_container" class="input-field col s12">'.
                        '<i id="search" class="material-icons prefix">search</i>'.
                        '<div class="chips-placeholder" onchange="rechercher()"></div>'.
                    '</div>';

    }

    echo        '</div>'.
           '</form>'.
         '</div>';
    echo '<div class="col s9">';

    // Pagination
    echo    '<ul class="pagination center">'.
                // Navigation icon
                '<li class="waves-effect">'.
                    '<a href="?page=1"><i class="material-icons">first_page</i></a>'.
                '</li>'.
                '<li class="waves-effect">'.
                    '<a href="?page='.($currentPage-1).'"><i class="material-icons">chevron_left</i></a>'.
                '</li>'.
                // Current page
                '<li class="active"><a href="#">'.$currentPage.'</a></li>'.

                // Navigation icon
                '<li class="waves-effect">'.
                    '<a href="?page='.($currentPage+1).'"><i class="material-icons">chevron_right</i></a>'.
                '</li>'.
                '<li class="waves-effect">'.
                    '<a href="?page='.$maxPage.'"><i class="material-icons">last_page</i></a>'.
                '</li>'.
            '</ul>';

    echo    '<div id="book_container" class="container">';
    echo        $books;
    echo    '</div>'.
        '</div>'.
    '</div>';




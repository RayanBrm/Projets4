var bookToDelete = -1;
var chips = $('.chips');
var themeAutocomplete = {};
var bookTheme = [];
var userToDelete = -1;
var filter = "";
var themeToAdd = [];

$(document).ready(function () {

    // Livres
    initEditorAutocomplete();
    initAuthorAutocomplete();
    initThemeAutocomplete();
    $('input#input_text, textarea#textarea1').characterCounter();
    $('.modal').modal();
    $('#book_search_chips').material_chip();

    // Etilisateurs
    $('select').material_select();
    $('#util_search_chips').material_chip();

    // Enfants
    $('#child_search_chips').material_chip();

    // Classes
    $('#changeClasses').on('click', modifyClasses);
    $('#newClasse').on('click', addClass);
    $('#classe_search_chips').material_chip();

    // Themes
    $('#themeBtnAdd').on('click', addTheme);
    $('#theme_filter_chips').material_chip();
    $('#theme_add_chips').material_chip();
    stylize();

    initChipsThemeAutocomplete();
    initChipsAction();

    $('.lock_icon').css({'padding-top':'0.45em', 'padding-left':'2px', position: 'absolute'});
});

function initChipsAction() {
    chips.on('chip.add', function (e, chip) {
        let data = chip.tag;
        console.log(this.id);
        if (this.id === 'book_search_chips') {
            rechercherLivre(data);
        } else if (this.id === 'add_book_theme_chips'){
            bookTheme.push(data);
        } else if(this.id === 'util_search_chips'){
            rechercherUtil(data,'util')
        }else if(this.id === 'child_search_chips'){
            rechercherUtil(data,'child')
        } else if(this.id === 'classe_search_chips'){
            rechercherClasse(data);
        } else if(this.id === 'theme_filter_chips'){
            filterBook(filter,data)
        } else if (this.id === 'theme_add_chips'){
            themeToAdd.push(data);
        }
    });

    chips.on('chip.delete', function (a,chip) {
        if (this.id === 'book_search_chips'){
            document.getElementById('book_container').innerHTML = "";
        }
        else if(this.id === 'add_book_theme_chips'){
            for(let i = 0; i < bookTheme.length; i++){
                if (bookTheme[i] === chip.tag){
                    bookTheme.splice(i, 1);
                    break;
                }
            }
        }else if(this.id === 'util_search_chips'){
            $('#util_container').html('');
        }else if(this.id === 'child_search_chips'){
            $('#child_container').html('');
        } else if(this.id === 'classe_search_chips'){
            $('#classe_container').html('')
        } else if(this.id === 'themeadd_chips'){
            for(let i = 0; i < themeToAdd.length; i++){
                if (themeToAdd[i] === chip.tag){
                    themeToAdd.splice(i, 1);
                    break;
                }
            }
        }
    });
}


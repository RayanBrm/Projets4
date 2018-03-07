var mainTheme;
var secondaryTheme = [];

$(document).ready(function () {
    let bookId = $('#id').val();
    initBookTheme(bookId);
    initEditorAutocomplete();
    initAuthorAutocomplete();

    $('textarea#description').characterCounter();
    $('#valider').on('click',validate);
});

$('.chips').on('chip.add',function (e, chip) {
                secondaryTheme.push(chip.tag);
                console.log(secondaryTheme);
           })
           .on('chip.delete',function(e,chip){
               for(let i = 0; i < secondaryTheme.length; i++){
                   if (secondaryTheme[i] === chip.tag){
                       secondaryTheme.splice(i, 1);
                       break;
                   }
               }
           });

function initBookTheme(bookId) {
    $.ajax({
        type:'GET',
        url:'ajax/getBookThemes/'+bookId,
        dataType:'json',
        success:function (responseText) {
            mainTheme = responseText.main;
            secondaryTheme = responseText.secondary;
            initMainTheme();
            initChipsSecondaryTheme();
        }
    })
}

function initMainTheme() {
    // TODO
}

// /!\ Use local variable
function initChipsSecondaryTheme() {
    $.getJSON('ajax/getThemeList','',function (responseText) {
        let themeAutoComplete = {};
        let data = [];

        for (let name of responseText) {
            themeAutoComplete[name] = null;
        }

        for(let theme of secondaryTheme){
            data.push({tag:theme});
        }

        $('.chips-autocomplete').material_chip({
            data,
            autocompleteOptions: {
                data: themeAutoComplete,
                limit: 5
            }
        });
    })

}

// Called when clicking validate button on book editing
/**
 * Get the data from the form and send it the new ones to the ajax controller to be save
 */
function validate() {
    let data = {};

    data['id'] = $('#id').val();
    data['titre'] = $('#titre').val();
    data['auteur'] = $('#auteur').val();
    data['edition'] = $('#edition').val();
    data['description'] = $('#description').val();
    data['themes'] = [];
    // Filling thems list thanks to global array which is up to date from secondary theme
    for(let i of secondaryTheme){
        data['themes'].push(i);
    }

    $.ajax({
        type:'POST',
        url:'ajax/editBook',
        data:data,
        success: function (responseText) {
            if (responseText === SUCCESS){
                Materialize.toast('Le livre a été modifié.', 5000);
            } else if (responseText === FAILURE){
                Materialize.toast('Une erreur est survenue. Réessayer plus tard ou contactez un administrateur.', 5000);
            }
        }
    })
}
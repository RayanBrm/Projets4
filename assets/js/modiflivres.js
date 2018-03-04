var mainTheme;
var secondaryTheme = [];

$(document).ready(function () {
   let bookId = $('#id').val();
    initBookTheme(bookId);
    initEditorAutocomplete();
    initAuthorAutocomplete();
    initThemeAutocomplete();
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
            initSecondaryTheme();
        }
    })
}

function initMainTheme() {
    $.ajax({
        type:'GET',
        url:'ajax/getMainThemes',
        success:function (responseText) {
            $('#main_theme').append(responseText);
            $('option[value='+mainTheme+']').attr('selected',true);
            $('select').material_select();
        }
    });
}

function initSecondaryTheme() {
    $.getJSON('ajax/getThemeList','',function (responseText) {
        let themeAutoComplete = {};
        let data = [];

        for (let name of responseText) {
            themeAutoComplete[name] = null;
        }

        for(let theme of secondaryTheme){
            data.push({tag:theme});
        }

        $('.chips-initial').material_chip({});

        $('.chips-autocomplete').material_chip({
            data,
            autocompleteOptions: {
                data: themeAutoComplete,
                limit: 5
            }
        });
    })

}

function initEditorAutocomplete() {
    $.getJSON('ajax/getEditors','',function (responseText) {
        let editorAutoComplete = {};
        for (let name of responseText) {
            editorAutoComplete[name] = null;
        }

        $('#editeur.autocomplete').autocomplete({
            data: editorAutoComplete,
            limit: 5,
            minLength: 2
        });
    })
}

function initAuthorAutocomplete() {
    $.getJSON('ajax/getAuthors','',function (responseText) {
        let authorAutoComplete = {};
        for (let name of responseText) {
            authorAutoComplete[name] = null;
        }

        $('#auteur.autocomplete').autocomplete({
            data: authorAutoComplete,
            limit: 5,
            minLength: 2
        });
    })
}
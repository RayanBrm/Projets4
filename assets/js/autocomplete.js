function initEditorAutocomplete() {
    $.getJSON('ajax/getEditors','',function (responseText) {
        let editorAutoComplete = {};
        for (let name of responseText) {
            editorAutoComplete[name] = null;
        }

        $('#edition.autocomplete').autocomplete({
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

function initChipsThemeAutocomplete() {
    $.ajax({
        type: 'GET',
        url: '/ajax/getThemeList',
        success: function (responseText) {
            let tmp = JSON.parse(responseText);

            for (let name of tmp) {
                themeAutocomplete[name] = null;
            }

            $('.chips-autocomplete').material_chip({
                autocompleteOptions: {
                    data: themeAutocomplete,
                    limit: 5
                }
            });
        }
    });
}


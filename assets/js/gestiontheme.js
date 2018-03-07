
$(document).ready(function() {
    //$('.chips-autocomplete').material_chip();
    $('select').material_select();
    $('#themeBtnAdd').on('click', addTheme);
});

function addTheme() {
    let data = {};
    data['nom'] = $('#themeType').val() + $('#theme').val();

    $.post('ajax/addTheme', data,function (responseText) {
        if (responseText === "success"){
            Materialize.toast('Le theme a été ajouté avec succès', 5000);
        }else if(responseText === "failure"){
            Materialize.toast('Une erreur s\'est produite, réessayez plus tard ou contactez un administrateur', 5000);
        }
    })
}
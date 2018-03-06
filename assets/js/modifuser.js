$(document).ready(function () {

    let classe = $('#current_classe').val();
    $('option[value='+classe+']').attr('selected', true);
    let pastille = $('#current_pastille').val();
    $('option[value='+pastille+']').attr('selected', true);

    $('select').material_select();

    $('#valider').on('click',validate);
});


function validate() {
    let serial = $('#modifForm').serializeArray();
    var data = {};

    serial.forEach(function (elm) {
        data[elm.name] = elm.value;
    });

    $.post('ajax/editUser',data,function (responseText) {
        if (responseText === "success"){
            Materialize.toast('L\'utilisateur a été modifier avec succès', 5000);
        }else if (responseText === "failure"){
            Materialize.toast('Une erreur est survenue, réessayer plus tard ou contactez un administrateur', 5000);
        }else if(responseText === "forbidden"){
            Materialize.toast('Vous essayez de modifier un administrateur, opération non-autorisé.', 5000);
        }
    })
}
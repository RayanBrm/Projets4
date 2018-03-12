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
        if (responseText === SUCCESS){
            Materialize.toast('L\'utilisateur a été modifié avec succès', 5000);
        }else if (responseText === FAILURE){
            Materialize.toast(ERROR_MESSAGE, 5000);
        }else if(responseText === FORBID){
            Materialize.toast(FORBID_MESSAGE, 5000);
        }
    })
}
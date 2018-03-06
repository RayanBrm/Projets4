$(document).ready(function () {

    let classe = $('#current_classe').val();
    $('option[value='+classe+']').attr('selected', true);
    let pastille = $('#current_pastille').val();
    $('option[value='+pastille+']').attr('selected', true);

    $('select').material_select();
});
$(document).ready(function () {
    $('select').material_select();
});

//$('.chips').material_chip();

$('.chips-placeholder').material_chip({
    placeholder: 'mot-clé',
    secondaryPlaceholder: '+ autre',
});

$('.chips').on('chip.remove',function () {
    location.reload();
});

$('.chips').on('chip.add',function () {
    // TODO : enhancements
   var data = $('.chips').material_chip('data')[0]['tag'];
   rechercher(data);
});


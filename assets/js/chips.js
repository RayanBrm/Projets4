$(document).ready(function () {
    $('select').material_select();
});

$('.chips').material_chip();

$('.chips-placeholder').material_chip({
    placeholder: 'mot-clé',
    secondaryPlaceholder: '+ autre',
});

$('.chips').on('add',function () {
    console.log("ici");
   var data = $('.chip-initial').material_chip('data');
   rechercher(data);
});
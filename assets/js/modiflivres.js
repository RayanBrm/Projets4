var mainTheme;
var secondaryTheme = [];

$(document).ready(function () {
   let bookId = $('#id').val();
    initBookTheme(bookId);
});

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
    let data = [];

    for(let theme of secondaryTheme){
        let tmp = theme.split('_')[1];
        data.push({tag:tmp});
    }
    $('.chips-initial').material_chip({data});
}

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
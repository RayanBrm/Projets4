
function addTheme() {
    let data = {};
    data['nom'] = $('#themeType').val() + $('#theme').val();

    $.post('ajax/addTheme', data,function (responseText) {
        if (responseText === SUCCESS){
            Materialize.toast('Le theme a été ajouté avec succès', 5000);
            $('#theme').val('');
        }else if(responseText === FAILURE){
            Materialize.toast('Une erreur s\'est produite, réessayez plus tard ou contactez un administrateur', 5000);
        }
    })
}

function stylize() {
    $('tbody').css({
        display:'block',
        height:'300px',
        overflow:'auto',
    });

    $('thead, tbody tr').css({
        display:'table',
        width:'100%',
        'table-layout':'fixed'
    });

    $('thead').css('width','calc( 100% - 1em)');

    $('table').css('width','100%');
}

$('#bookSelector').on('change', function (elm) {
    if (elm.target.value === "all"){
        filterBook('all','');
    } else {
        filter = elm.target.value;
    }
});

$('#assign_theme').on('click', function () {

    let checkbox = $('#filter_book_container').find('input:checked');
    if ( checkbox.count > 0 && themeToAdd.count > 0){
        var bookList = [];
        checkbox.each(function () {
            bookList.push(this.id);
        });

        
    } else {
        Materialize.toast('Entrez des livres ou des themes a ajouter avant', 5000)
    }



});

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

function filterBook(filter, data) {
    $.post('ajax/filterBook',{filter:filter,data:data}, function (responseText) {
        if (responseText === UNKNOWN){
            Materialize.toast('Aucun livre ne correspond a votre recherche.', 5000);
        }else if(responseText === FAILURE){
            Materialize.toast(ERROR_MESSAGE, 5000);
        }else {
            $('#filter_book_container').html(responseText);
        }
    })
}


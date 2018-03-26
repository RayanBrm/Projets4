var bookToLoan = 0;


$('.chips').on('chip.delete',function () {
            location.reload();
         }).on('chip.add',function (e, chip) {
            rechercher(chip.tag);
        });

$(document).ready(function() {
    $('#modal1').modal();
    $('select').material_select();
});

function rechercher(search)
{
    $.ajax({
        url:'ajax/getBook',
        type:'POST',
        data:{
            search:search
        },
        success:function (response) {
            $('#book_container').html(response)
        }
    })
}

function loan(bookId){
    bookToLoan = bookId;
    $('#modal1').modal('open');
}

function loadClasse(value) {

    if (value === '0'){
        $.ajax({
            type : 'GET',
            url  : '/ajax/getClasseList',
            data: '',
            success: function (responseText) {
                $('#class_select').html(responseText).material_select();
            }
        });

        $('.hsl').show();
    }else {
        $('.hsl').hide();
    }
}

function loadChild(classeId) {
    $.ajax({
        type : 'GET',
        url  : '/ajax/getClasse/'+classeId+'/option',
        success: function (responseText) {
            $('#child_select').html(responseText).material_select();
        }
    });
}

function validateLoan() {

    let user_id = $('#loan_select').val();

    if(user_id === '0'){
        user_id = $('#child_select').val();
    }

    if(bookToLoan !== 0){
        $.ajax({
            type : 'GET',
            url  : '/ajax/addEmprunt/'+bookToLoan+'/'+user_id,
            success: function (responseText) {
                $('#modal1').modal('close');
                let message = (responseText === SUCCESS)? 'Le livre a bien été emprunté' : 'Une erreur est survenue, le livre est deja emprunté ou l\'utilisateur a déjà un emprunt en cours' ;
                Materialize.toast(message,4000);
                bookToLoan = 0;
            }
        });
    }
}

function validateChildLoan(childId) {
    if(bookToLoan !== 0){
        $.ajax({
            type : 'GET',
            url  : '/ajax/addEmprunt/'+bookToLoan+'/'+childId,
            success: function (responseText) {
                $('#modal1').modal('close');
                let message = (responseText === SUCCESS)? 'Le livre a bien été emprunté' : 'Le livre est déjà emprunté ou vous avez déjà un emprunt en cours !' ;
                Materialize.toast(message,4000);
                bookToLoan = 0;
            }
        });
    }
}

function themeFilter(nb) {
    let src = (nb === 0)? '#main_theme_selector' : '#second_theme_selector';
    let theme = $(src).val();

    $.get('ajax/getBookByTheme?themeId='+theme,function (responseText) {
        $('#book_container').html(responseText);
    })
}
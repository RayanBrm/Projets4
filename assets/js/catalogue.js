var bookToLoan = 0;


$('.chips').on('chip.delete',function () {
            location.reload();
         }).on('chip.add',function () {
            // TODO : enhancements
            var data = $('.chips').material_chip('data')[0]['tag'];
            rechercher(data);
        });

$(document).ready(function() {
    $('#modal1').modal();
    $('select').material_select();
});

function rechercher(search)
{
    var xhr = getXHR();
    console.log(search);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Recherché : "+search);
            document.getElementById('book_container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "/ajax/getBook", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search="+search);
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
                let message = (responseText === 'true')? 'Le livre a bien été emprunter' : 'Une erreur est survenue, le livre est deja emprunter ou l\'utilisateur a déjà un emprunt en cours' ;
                Materialize.toast(message,4000);
            }
        });
    }
}

function validateChildLoan(childId) {
    $.ajax({
        type : 'GET',
        url  : '/ajax/addEmprunt/'+bookToLoan+'/'+childId,
        success: function (responseText) {
            $('#modal1').modal('close');
            let message = (responseText === 'true')? 'Le livre a bien été emprunter' : 'Une erreur est survenue, le livre est deja emprunter ou l\'utilisateur a déjà un emprunt en cours' ;
            Materialize.toast(message,4000);
        }
    });
}
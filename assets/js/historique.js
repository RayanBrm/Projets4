let bookToReturn = [];

$(document).ready(function () {
   var ret = $('#retard');

   if (!outdated)
       ret.hide();
   ret.on('click', function () {
        $.ajax({
            type:'GET',
            url:'ajax/getOutdated',
            success: function (responseText) {
                if (responseText === EMPTY){
                  responseText = "<li class='collection-header center'><blockquote>Aucun emprunt en retard</blockquote></li>"
                }
                let prev = "<li class='collection-header center'><h4>Emprunt en retards</h4></li>";
                $('#emprunt_container').html(prev+responseText);
            }
        })
   });
});

function multiLoad() {
    loadClasse();
    loadClasseEmrunt();
}

function loadClasseEmrunt(){
    var classe = document.getElementById('classe_select').value;

    $.ajax({
        url:'ajax/getEmprunt/'+classe+'/1',
        type:'GET',
        success: function (response) {
            $('#emprunt_container').html(response);
        }
    });
}

function loadClasse() {
    var classe = document.getElementById('classe_select').value;

    $.ajax({
       url:'ajax/getClasse/'+classe+'/option',
       type:'GET',
       success:function (response) {
           $('#child_select').html(response);
           $(document).ready(function() {
               $('select').material_select();
           });
       }
    });
}

function loadEmprunt() {
    var child = document.getElementById('child_select').value;

    $.ajax({
        url:'ajax/getEmprunt/'+child,
        type:'GET',
        success: function(response){
            $('#emprunt_container').html(response)
        }
    });
}

function toggleBook(checkField) {
    let id = checkField.id;

    let bookId = $('#'+id+'_id').get(0).value;
    let childId = $('#'+id+'_child').get(0).value;
    let date = $('#'+id+'_date').get(0).value;

    let i = 0;
    let found = false;

    for (let val of bookToReturn){
        if (val.id === checkField.id){
            bookToReturn.splice(i,1);
            found = true;
            break;
        }
        i++;
    }

    if (found === false){
        bookToReturn.push({id:id,id_livre:bookId,id_eleve:childId,dateEmprunt:date});
    }
}

function returnAllCurrent() {

    bookToReturn = [];

    $('input:checkbox').each(function () {
        let id = this.id;

        let bookId = $('#'+id+'_id').get(0).value;
        let childId = $('#'+id+'_child').get(0).value;
        let date = $('#'+id+'_date').get(0).value;

        bookToReturn.push({id:id,id_livre:bookId,id_eleve:childId,dateEmprunt:date});
    });

    returnBook(bookToReturn);
}

function returnAllChecked() {
    returnBook(bookToReturn);
}

function returnBook(bookArray) {

    if (bookArray.length !== 0){
        $.ajax({
            type : 'POST',
            url  : '/ajax/returnBook',
            data: {bookList:bookArray},
            success: function (responseText) {
                if (responseText === SUCCESS){
                    Materialize.toast('Les livres ont été rendu', 4000);
                    loadClasseEmrunt();
                }else {
                    Materialize.toast('Une erreur est survenue '+responseText, 4000);
                }
            }
        });
    }
    else {
        Materialize.toast('Vous n\'avez selectionné aucun livre', 4000);
    }
}
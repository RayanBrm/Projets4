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
    var xhr = getXHR();
    var classe = document.getElementById('classe_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            document.getElementById('emprunt_container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "/ajax/getEmprunt/"+classe+"/1", true);
    xhr.send();
}

function loadClasse() {
    var xhr = getXHR();
    var classe = document.getElementById('classe_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Classe : "+classe);
            document.getElementById('child_select').innerHTML = xhr.responseText;
            $(document).ready(function() {
                $('select').material_select();
            });
        }
    };

    xhr.open("GET", "/ajax/getClasse/"+classe+"/option", true);
    xhr.send();
}

function loadEmprunt() {
    var xhr = getXHR();
    var child = document.getElementById('child_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            document.getElementById('emprunt_container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "/ajax/getEmprunt/"+child, true);
    xhr.send();
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
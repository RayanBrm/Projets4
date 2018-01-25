var bookToReturn = {};

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
    let bookId = document.getElementById('_'+id).value;

    if (bookToReturn[bookId] === 1){
        delete bookToReturn[bookId];
    }else {
        bookToReturn[bookId] = 1;
    }
}

function returnAllCurrent() {
    let bookList = {};
    let input = $('input[type=text]').forEach(function (current) {
        bookList[current.id] = 1;
    });

    returnBook(bookList);
}

function returnAllChecked() {
    returnBook(bookToReturn);
}

function returnBook(bookArray) {
    $.ajax({
        type : 'POST',
        url  : '/ajax/returnBook',
        data: {bookList:bookArray},
        success: function (responseText) {
            if (responseText === 'true'){
                Materialize.toast('Les livres ont été supprimer', 4000);
            }else {
                Materialize.toast('Une erreur est survenue '+responseText, 4000);
            }
        }
    });
}
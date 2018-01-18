// TODo : Refactor gestionutil/gestionbu to 1 generic module
var bookToDelete = -1;
var chips = $('.chips');

$(document).ready(function() {
    $('select').material_select();
    $('input#input_text, textarea#textarea1').characterCounter();
    $('.modal').modal();
});

chips.on('chip.add',function () {
    // TODO : enhancements
    var data = $('.chips').material_chip('data')[0]['tag'];
    rechercher(data);
});

chips.on('chip.delete',function () {
    document.getElementById('book_container').innerHTML = "";
});

$('.datepicker').pickadate({
    selectMonths: false, // Creates a dropdown to control month
    selectYears: 20, // Creates a dropdown of 15 years to control year,
    today: 'Aujourd\'hui',
    clear: 'Annuler',
    close: 'Valider',
    closeOnSelect: true // Close upon selecting a date,
});

function rechercher(search)
{
    var xhr = getXHR();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Recherché : "+search);
            document.getElementById('book_container').innerHTML = xhr.responseText;


        }
    };

    xhr.open("POST", "/ajax/getBook", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search="+search+"&display=toModify");
}

function addBook() {
    var xhr = getXHR();

    var chain = "";
    chain+="isbn="+document.getElementsByName('isbn')[0].value;
    chain+="&titre="+document.getElementsByName('titre')[0].value;
    chain+="&auteur="+document.getElementsByName('auteur')[0].value;
    chain+="&edition="+document.getElementsByName('edition')[0].value;
    chain+="&parution="+document.getElementsByName('parution')[0].value;
    chain+="&description="+document.getElementsByName('description')[0].value;
    chain+="&couverture="+document.getElementsByName('couverture')[0].value;

    console.log(chain);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            if (xhr.responseText === "true"){
                document.getElementById('book_form').reset();
                Materialize.toast('Le livre a été ajouté', 4000);
            }
            else {
                Materialize.toast('Une erreur s\'est produite', 4000);
            }
        }
    };

    xhr.open("POST", "/ajax/addBook", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(chain);
}

function deleteBook(bookid) {
    bookToDelete = bookid;
    $('#modal1').modal('open');
}

function agree() {
    console.log('Book : '+bookToDelete+' will be deleted');
    // TODO : ajax method to delet book
    if (true){
        document.getElementById('book_container').innerHTML = "";
        Materialize.toast('Le livre a été supprimé', 4000);
    }
    else {
        Materialize.toast('Une erreur s\'est produite', 4000);
    }

}
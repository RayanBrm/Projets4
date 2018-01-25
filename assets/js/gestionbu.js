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
    let form = $('form')[0];
    let data = new FormData(form);
    data.append('add-path',document.getElementById('add-path').checked);

    $.ajax({
        type : 'POST',
        url  : '/ajax/addBook',
        data : data,
        processData: false,
        contentType: false,
        success: function (responseText) {
            if (responseText === "true") {
                document.getElementById('book_form').reset();
                Materialize.toast('Le livre a été ajouté', 4000);

                let addpath = $('#add-path');
                if (addpath.get(0).checked === true){
                    addpath.checked(false);
                    toggleFile();
                }
            }
            else {
                Materialize.toast('Une erreur s\'est produite ' + responseText, 4000);
            }
        }
    });

    form.reset();
}

function deleteBook(bookid)
{
    bookToDelete = bookid;
    $('#modal1').modal('open');
}

function agree()
{
    console.log('Book : '+bookToDelete+' will be deleted');
    // TODO : ajax method to delete book
    if (true){
        document.getElementById('book_container').innerHTML = "";
        Materialize.toast('Le livre a été supprimé', 4000);
    }
    else {
        Materialize.toast('Une erreur s\'est produite', 4000);
    }

}

// Google API request testing, launched on click of research button
function getByIsbn() // API Google working
{
    // Get isbn number from form
    let isbn = document.getElementById('isbn').value;
    let xhr = getXHR();

    // ISBN value testing, can be ISBN 10 or 13
    if (isbn !== "" && isbn !== undefined && isbn !==  null && isbn.length >= 10 && isbn.length <= 13){
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
                // Getting response as JSON
                let book = JSON.parse(xhr.responseText);
                console.log(book); // Debug display
                // Response checking
                if(book['totalItems'] > 0 && book['items'][0]['volumeInfo'] !== undefined){
                    // Fill the form
                    fill(book['items'][0]['volumeInfo'])
                }
                else {
                    // Displaying erro message
                    Materialize.toast('L\'isbn est invalide ou le livre n\'est pas référencer chez Google.',4000);
                    Materialize.toast('Vous devriez entrez le livre à la main.',4000);
                }
            }
        };

        xhr.open("GET", "https://www.googleapis.com/books/v1/volumes/?q=isbn:"+isbn, true);
        // Google api key, not required for simple get
        xhr.setRequestHeader('Access-Control-Allow-Origin', 'AIzaSyAL_jvVpvMXMvlZYF35egMZ-Jrkoq6lLMY');
        xhr.send();
    }
}

// Fill in the needed fields about the books and set it active for materialize compatibility
function fill(bookInfo)
{
    $('#titre').val(bookInfo['title']);
    $('#auteur').val(bookInfo['authors'].join(', '));
    $('#edition').val(bookInfo['publisher']);
    $('#parution').val(bookInfo['publishedDate']);
    $('#description').val(bookInfo['description']);
    // Even fill hidden fields for book cover

    if(bookInfo['imageLinks'] === undefined || bookInfo['imageLinks'] === null){
        $('#add-path').attr('checked',true);
        toggleFile();
        Materialize.toast('Attention, la couverture pour ce livre n\'est pas disponible!',10000);
    }else{
        $('#couverture').val(bookInfo['imageLinks']['thumbnail']);
    }


    $('#book_form').find('label').addClass('active');
}

// Display or not the file input field, clear it at each click
function toggleFile() {
    $('#file-input').toggle();
    $('[id^=local-couverture]').val('');
}

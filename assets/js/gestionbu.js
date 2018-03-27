
$('.datepicker').pickadate({
    selectMonths: false, // Creates a dropdown to control month
    selectYears: 20, // Creates a dropdown of 15 years to control year,
    today: 'Aujourd\'hui',
    clear: 'Annuler',
    close: 'Valider',
    closeOnSelect: true // Close upon selecting a date,
});

// Search bar
function rechercherLivre(search) {
    $.ajax({
        url:'ajax/getBook',
        type:'POST',
        data:{
            search:search,
            display:'toModify'
        },
        success: function(response){
            $('#book_container').html(response);
        }
    });
}

// Add book button
function addBook() {
    // Check non empty form before
    let form = $('form')[0];
    let data = new FormData(form);
    bookTheme.push($('#mainTheme').val());
    data.append('add-path', document.getElementById('add-path').checked);
    data.append('theme', bookTheme.join(';'));

    $.ajax({
        type: 'POST',
        url: '/ajax/addBook',
        data: data,
        processData: false,
        contentType: false,
        success: function (responseText) {
            console.log(responseText.length);
            if (responseText === SUCCESS) {
                document.getElementById('book_form').reset();
                Materialize.toast('Le livre a été ajouté', 4000);

                $('#file-input').hide();
                $('[id^=local-couverture]').val('');
                form.reset();
            }
            else {
                Materialize.toast('Une erreur s\'est produite ' + responseText, 4000);
            }
        }
    });
}

// Called on click of delete icon
function deleteBook(bookid) {
    bookToDelete = bookid;
    $('#modal_container_1').text('La suppression d\'un livre est définitive. Etes vous sur de vouloir continuer ?');
    $('#modal1').modal('open');
}

// Called when validation button clicked on book deleting
function agreeLivre() {
    console.log('Book : ' + bookToDelete + ' will be deleted');
    $.ajax({
        type: 'POST',
        url: '/ajax/deleteBook',
        data: 'book=' + bookToDelete,
        success: function (responseText) {
            if (responseText === SUCCESS) {
                document.getElementById('book_container').innerHTML = "";
                Materialize.toast('Le livre a été supprimé', 4000);
            }
            else {
                Materialize.toast('Une erreur s\'est produite', 4000);
            }
        }
    });


}

// Google API request testing, launched on click of research button
function getByIsbn() // API Google working
{
    // Get isbn number from form
    let isbn = document.getElementById('isbn').value;

    // ISBN value testing, can be ISBN 10 or 13
    if (isbn !== "" && isbn !== undefined && isbn !== null && isbn.length >= 10 && isbn.length <= 13) {
        $('#spinner').addClass('spin');

        $.ajax({
            url:'https://www.googleapis.com/books/v1/volumes/?q=isbn:'+isbn,
            type:'GET',
            beforeSend:function (xhr) {
                xhr.setRequestHeader('Access-Control-Allow-Origin', 'AIzaSyAL_jvVpvMXMvlZYF35egMZ-Jrkoq6lLMY');
            },
            success: function(response){
                // Response checking
                if (response['totalItems'] > 0 && response['items'][0]['volumeInfo'] !== undefined) {
                    // Fill the form
                    fill(response['items'][0]['volumeInfo'])
                }
                else {
                    // Displaying erro message
                    Materialize.toast('L\'isbn est invalide ou le livre n\'est pas référencer chez Google.', 4000);
                    Materialize.toast('Vous devriez entrez le livre à la main.', 4000);
                }
                $('#spinner').removeClass('spin')
            }
        });
    }
}

// Fill in the needed fields about the books and set it active for materialize compatibility
function fill(bookInfo) {
    console.log(bookInfo);
    $('#titre').val(bookInfo['title']);
    $('#auteur').val((bookInfo['authors'] !== undefined)?bookInfo['authors'].join(', '): '');
    $('#edition').val(bookInfo['publisher']);
    $('#parution').val(bookInfo['publishedDate']);
    $('#description').val(bookInfo['description']);
    // Even fill hidden fields for book cover

    if (bookInfo['imageLinks'] === undefined || bookInfo['imageLinks'] === null) {
        $('#add-path').prop('checked', true);
        $('#file-input').show();
        $('[id^=local-couverture]').val('');
        Materialize.toast('Attention, la couverture pour ce livre n\'est pas disponible!', 10000);
    } else {
        $('#couverture').val(bookInfo['imageLinks']['thumbnail']);
    }


    $('#book_form').find('label').addClass('active');
}

// Display or not the file input field, clear it at each click
function toggleFile(elm) {
    if(elm.checked === true){
        $('#file-input').show();
    } else {
        $('#file-input').hide();
    }
}

function initThemeAutocomplete() {
    $.get('ajax/getMainThemes', function (responseText){
        $('#mainTheme').append(responseText).material_select();
    })

}
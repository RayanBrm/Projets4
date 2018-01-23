// Google API request testing, launched on click of research button
function test() { // API Google working
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
function fill(bookInfo){
    $('#titre').val(bookInfo['title']);
    $('#auteur').val(bookInfo['authors'].join(', '));
    $('#edition').val(bookInfo['publisher']);
    $('#parution').val(bookInfo['publishedDate']);
    $('#description').val(bookInfo['description']);
    // Even fill hidden fields for book cover
    $('#couverture').val(bookInfo['imageLinks']['thumbnail']);

    $('#book_form').find('label').addClass('active');
}

// Display or not the file input field, clear it at each click
function toggleFile() {
    $('#file-input').toggle();
    $('[id^=local-couverture]').val('');
}

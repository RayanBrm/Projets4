function test() {
    let isbn = document.getElementById('isbn').value;
    let dump = document.getElementById('dump');

    var xhr = getXHR();
    if (isbn != ""){
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
                console.log(JSON.parse(xhr.responseText));
                if(analyze(JSON.parse(xhr.responseText))){
                    getImage();
                    fill(JSON.parse(xhr.responseText)['items'][0]['volumeInfo'])
                }
                else {
                    Materialize.toast('L\'isbn est invalide ou le livre n\'est pas référencer chez Google.',4000);
                    Materialize.toast('Vous devriez entrez le livre à la main.',4000);
                }
            }
        };

        xhr.open("GET", "https://www.googleapis.com/books/v1/volumes/?q=isbn:"+isbn, true);
        xhr.setRequestHeader('Access-Control-Allow-Origin', 'AIzaSyAL_jvVpvMXMvlZYF35egMZ-Jrkoq6lLMY');
        xhr.send();
    }
}

function analyze(book) {
    return book['items'] !== undefined && book['items'][0] !== undefined && book['items'][0]['volumeInfo'] !== undefined;
}

function fill(bookInfo){
    document.getElementById('titre').value = bookInfo['title'];
    document.getElementById('auteur').value = bookInfo['authors'].join(', ');
    document.getElementById('edition').value = bookInfo['publisher'];
    document.getElementById('parution').value = bookInfo['publishedDate'];
    document.getElementById('description').value = bookInfo['description'];
}

function getImage() {

}
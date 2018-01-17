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

function deleteBook(bookid) {
    bookToDelete = bookid;
    $('#modal1').modal('open');
}
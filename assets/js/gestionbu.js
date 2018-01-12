$(document).ready(function() {
    $('select').material_select();
    $('input#input_text, textarea#textarea1').characterCounter();
});

$('.chips').on('chip.add',function () {
    // TODO : enhancements
    var data = $('.chips').material_chip('data')[0]['tag'];
    rechercher(data);
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
    $('#modal1').modal('open');
}
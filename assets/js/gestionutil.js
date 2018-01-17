var userToDelete = -1;

$(document).ready(function() {
    $('.modal').modal();
});

$('.chips').on('chip.add',function () {
    // TODO : enhancements
    var data = $('.chips').material_chip('data')[0]['tag'];
    rechercherUtil(data);
});

function rechercherUtil(search)
{
    var xhr = getXHR();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Recherché : "+search);
            document.getElementById('book_container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "/ajax/getUser", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search="+search+"&");
}

function deleteUser(uid) {
    userToDelete = uid;
    document.getElementById('modal_container').innerText = "La suppression d'un utilisateur est définitive! Etes vous sur de vouloir le supprimer?"
    $('#modal1').modal('open');
}

function agree() {
    console.log("user "+userToDelete+" will be deleted");
    //window.location.reload();
}
var userToDelete = -1;
const modalAddc = '#modal_container_2';
const modalAdd = '#modal2';
const modalRmc = '#modal_container_1';
const modalRm = '#modal1';

$(document).ready(function() {
    $('.modal').modal();
});

$('.chips')
    .on('chip.add',function (e,chip) {
        let data = chip.tag;
        let origin = "";

        if (this.id === 'childchip')
            origin = 'child';
        else if(this.id === 'utilchip')
            origin = 'util';
        else{
            Materialize.toast('Error',4000);
            return;
        }

        rechercher(data, origin);
    })
    .on('chip.delete',function () {
        $('#child_container').html('');
        $('#util_container').html('');
    });


function add(form) {
    let data = "";
    let message = "";

    $('#popup_button').on('click',emptyForm);

    if (form === 'util' && isCompleteForm(form)){
        let identifiant = $('#identifiant').val();
        let mdp = $('#motdepasse').val();
        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        let role = $('#role').val();

        data = "identifiant="+identifiant+"&motdepasse="+mdp+"&prenom="+prenom+"&nom="+nom+"&role="+role;
        message = "L'utilisateur a été ajouté";
    }else if(form === 'child' && isCompleteForm(form)){
        let nom = $('#Nom').val();
        let prenom = $('#Prenom').val();
        let classe = $('#Classe').val();

        data = 'nom='+nom+'&prenom='+prenom+'&classe='+classe;
        message = "L'élève a été ajouté";
    }else{
        $(modalAddc).html("Le formulaire est incomplet, veuillez le remplir").removeClass('valid');
        $(modalAdd).modal('open');
        return;
    }

    $.ajax({
        type:'POST',
        url:'/ajax/adduser',
        data: data,
        success: function (responseText) {
            if (responseText === SUCCESS){
                $(modalAddc).html(message).addClass('valid');
                $(modalAdd).modal('open');
            }
            else if (responseText === FAILURE){
                $(modalAddc).html("Un probleme est survenue, réessayer plus tard ou contactez un administrateur.").removeClass('valid');
                $(modalAdd).modal('open');
            } else if (responseText === EXIST){
                $(modalAddc).html("L'identifiant que vous avez saisie éxiste déjà, réessayer avec un autre.").removeClass('valid');
                $(modalAdd).modal('open');
            }
        }
    });

}

function rechercher(search,type) {
    console.log('Recherché : '+search+', Type : '+type);

    $.ajax({
        type:'POST',
        url:'/ajax/getUser',
        data: 'search='+search+'&type='+type,
        success: function (responseText) {
            $('#'+type+'_container').html(responseText);
        }
    });
}

function emptyForm() {
    $('input').val('');
    $('label').removeClass('active');
}

function isCompleteForm(form) {
    if (form === 'util'){
        return (document.getElementById('identifiant').value !== "" &&
            document.getElementById('motdepasse').value !== "" &&
            document.getElementById('prenom').value !== "" &&
            document.getElementById('nom').value !== "" &&
            document.getElementById('role').value !== ""
        );
    }else if(form === 'child'){
        return (document.getElementById('Nom').value !== "" &&
            document.getElementById('Prenom').value !== "" &&
            document.getElementById('Classe').value !== ""
        );
    }
}

function deleteUser(uid)
{
    userToDelete = uid;
    $(modalRmc).html("La suppression d'un utilisateur est définitive! Etes vous sur de vouloir le supprimer?");
    $(modalRm).modal('open');
}

function agree()
{
    console.log("user "+userToDelete+" will be deleted");

    $.ajax({
        type:'POST',
        url:'/ajax/delUser',
        data: 'userId='+userToDelete,
        success: function (responseText) {
            if (responseText === SUCCESS){
                $(modalAddc).html('L\'utilisateur a été supprimé').addClass('valid');
                $(modalAdd).modal('open');
            }else {
                $(modalAddc).html('Une erreur est survenue, réessayez ou contactez un administrateur.').removeClass('active');
                $(modalAdd).modal('open');
            }
        }
    });

    $('#child_container').html('');
    $('#util_container').html('');
}
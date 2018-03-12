var userToDelete = -1;

function add(form) {
    let data = "";
    let message = "";

    if (form === 'util' && isCompleteForm(form)){
        let identifiant = $('#identifiant').val();
        let mdp = $('#motdepasse').val();
        let nom = $('#util_nom').val();
        let prenom = $('#util_prenom').val();
        let role = $('#role').val();

        data = "identifiant="+identifiant+"&motdepasse="+mdp+"&prenom="+prenom+"&nom="+nom+"&role="+role;
        message = "L'utilisateur a été ajouté";
    }else if(form === 'child' && isCompleteForm(form)){
        let nom = $('#child_nom').val();
        let prenom = $('#child_prenom').val();
        let classe = $('#classe').val();

        data = 'nom='+nom+'&prenom='+prenom+'&classe='+classe;
        message = "L'élève a été ajouté";
    }else{
        Materialize.toast("Le formulaire est incomplet, veuillez le remplir",10000);
        return;
    }

    $.ajax({
        type:'POST',
        url:'/ajax/adduser',
        data: data,
        success: function (responseText) {
            if (responseText === SUCCESS){
                Materialize.toast(message,5000);
                emptyForm();
            }
            else if (responseText === FAILURE){
                Materialize.toast(ERROR_MESSAGE,5000);
            } else if (responseText === EXIST){
                Materialize.toast("L'identifiant que vous avez saisie éxiste déjà, réessayer avec un autre.",5000);
            } else if (responseText === FORBID){
                Materialize.toast(FORBID_MESSAGE,5000);
            }
        }
    });

}

function rechercherUtil(search,type) {
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
    let form = $('#util_add');
    form.find('input').val('');
    form.find('label').removeClass('active');
    form = $('#child_add');
    form.find('input').val('');
    form.find('label').removeClass('active');
}

function isCompleteForm(form) {
    if (form === 'util'){
        return (document.getElementById('identifiant').value !== "" &&
            document.getElementById('motdepasse').value !== "" &&
            document.getElementById('util_prenom').value !== "" &&
            document.getElementById('util_nom').value !== "" &&
            document.getElementById('role').value !== ""
        );
    }else if(form === 'child'){
        return (document.getElementById('child_nom').value !== "" &&
            document.getElementById('child_prenom').value !== "" &&
            document.getElementById('classe').value !== ""
        );
    }
}

function deleteUser(uid)
{
    userToDelete = uid;
    $('#modal_container_2').html("La suppression d'un utilisateur est définitive! Etes vous sur de vouloir le supprimer?");
    $('#modal2').modal('open');
}

function agreeUtil()
{
    console.log("user "+userToDelete+" will be deleted");

    $.ajax({
        type:'POST',
        url:'/ajax/delUser',
        data: 'userId='+userToDelete,
        success: function (responseText) {
            if (responseText === SUCCESS){
                Materialize.toast('L\'utilisateur a été supprimé', 5000);
            }else if (responseText === FORBID){
                Materialize.toast(FORBID_MESSAGE, 5000);
            } else {
                Materialize.toast(ERROR_MESSAGE, 5000);
            }
        }
    });

    $('#child_container').html('');
    $('#util_container').html('');
}
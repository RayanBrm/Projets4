var ERROR_MESSAGE = 'Une erreur s\'est produite durant l\'opération. Réessayer plus tard ou contactez l\'administrateur.';
var toDelete = -1;
const modalRmc = '#modal_container_1';
const modalRm = '#modal1';

$(document).ready(function () {
        $('#changeClasses').on('click', modifyClasses);
        $('#newClasse').on('click', addClass);
        $('.modal').modal();
        $('.chips')
            .on('chip.add',search)
            .on('chip.delete',function () {
                $('#classe_container').html('')
            });
});


function modifyClasses() {
    let classe = $(`input[name=classes]:checked`);
    let checkbox = $('input[type=checkbox]:checked');

    if(classe.length === 0 || checkbox.length === 0){
        Materialize.toast('Veuillez selectionnez des éléments a modifier.',5000);
    }else {
        let newClass = classe.attr('id').split('_')[1];
        let childs = [];

        for (elm of checkbox){
            childs.push(elm.id);
        }

        $.ajax({
            type:'POST',
            url:'ajax/changeChildClass',
            data:{
                childs:JSON.stringify(childs),
                classe:newClass
            },
            success: function (responseText) {
                if(responseText === "success"){
                    location.reload();
                }else if(responseText === "failure"){
                    Materialize.toast(ERROR_MESSAGE,5000);
                }
            }
        })
    }
}

function addClass() {
    let libelle = $('#classe');

    if (libelle.val().length > 0){
        $.ajax({
            type:'POST',
            url:'ajax/addClasse',
            data:{
                classe:libelle.val()
            },
            success: function (responseText) {
                if (responseText === "success"){
                    Materialize.toast('La classe a été ajoutée', 5000);
                    libelle.val('');
                    libelle.next().removeClass('active');

                }else if(responseText === "failure"){
                    Materialize.toast(ERROR_MESSAGE, 5000);
                }
            }
        });
    }else{
        Materialize.toast('Veuillez completer le nom de classe avant de valider', 5000);
    }
}

function editClass(classe) {
    let lib = $('#input_'+classe);

    if (lib.val().length === 0){
        Materialize.toast('Veuillez entrez un nom valide', 5000);
        return;
    }

    if (lib.attr('data-origin') !== lib.val()){
        $.ajax({
            type:'POST',
            url:'ajax/editClasse',
            data:{
                id:classe,
                libelle:lib.val()
            },
            success: function (responseText) {
                if (responseText === "success"){
                    Materialize.toast('La classe a été modifée.', 5000);
                }else if(responseText === "failure"){
                    Materialize.toast(ERROR_MESSAGE, 5000);
                }
            }
        });
    }else {
        Materialize.toast('Veuillez entrez un nom différent de l\'actuel si vous voulez le modifier', 5000);
    }


}

function deleteClass(classe) {
    toDelete = classe;
    $(modalRmc).html("La suppression d'une classe est définitive! Etes vous sur de vouloir la supprimer?");
    $(modalRm).modal('open');
}

function agree() {
    $.ajax({
        type:'POST',
        url:'ajax/deleteClasse',
        data:{
            classe:toDelete
        },
        success: function (responseText) {
            if (responseText === "success"){
                Materialize.toast('La classe a été supprimée.', 5000);
                console.log(toDelete);
                $('#classe_container').find('input[id=input_'+toDelete+']').parent().parent().parent().remove();
            }else if(responseText === "failure"){
                Materialize.toast(ERROR_MESSAGE, 5000);
            }
        }
    });
}

function search(e,chip) {
    $.ajax({
       type:'POST',
       url:'ajax/searchClasse',
       data:{
           classe:chip.tag
       },
       success:function (responseText) {
           $('#classe_container').html(responseText);
           Materialize.updateTextFields();
           $('.classe_input').css({
                margin:'0px',
                height:'2rem'
           }).parent().parent().css('margin','0px');
       }
    });
}
var classeToDelete = -1;

// Affectations
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
                if(responseText === SUCCESS){
                    // TODO : ??
                    location.reload();
                }else if(responseText === FAILURE){
                    Materialize.toast(ERROR_MESSAGE,5000);
                }
            }
        })
    }
}

function addClass() {
    let libelle = $('#classe_add');

    if (libelle.val().length > 0){
        $.ajax({
            type:'POST',
            url:'ajax/addClasse',
            data:{
                classe:libelle.val()
            },
            success: function (responseText) {
                if (responseText === SUCCESS){
                    Materialize.toast('La classe a été ajoutée', 5000);
                    libelle.val('');
                    libelle.next().removeClass('active');

                }else if(responseText === FAILURE){
                    Materialize.toast(ERROR_MESSAGE, 5000);
                }
            }
        });
    }else{
        Materialize.toast('Veuillez completer le nom de classe avant de valider', 5000);
    }
}

function editClass(classe) {
    var lib = $('#input_'+classe);

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
                if (responseText === SUCCESS){
                    Materialize.toast('La classe a été modifée.', 5000);
                    lib.attr('data-origin',lib.val());
                }else if(responseText === FAILURE){
                    Materialize.toast(ERROR_MESSAGE, 5000);
                }
            }
        });
    }else {
        Materialize.toast('Veuillez entrez un nom différent de l\'actuel si vous voulez le modifier', 5000);
    }


}

function deleteClass(classe) {
    classeToDelete = classe;
    $('#modal_container_3').html("La suppression d'une classe est définitive! Etes vous sur de vouloir la supprimer?");
    $('#modal3').modal('open');
}

function agreeClasse() {
    $.ajax({
        type:'POST',
        url:'ajax/deleteClasse',
        data:{
            classe:classeToDelete
        },
        success: function (responseText) {
            if (responseText === SUCCESS){
                Materialize.toast('La classe a été supprimée.', 5000);
                console.log(classeToDelete);
                $('#classe_container').find('input[id=input_'+classeToDelete+']').parent().parent().parent().remove();
            }else if(responseText === FAILURE){
                Materialize.toast(ERROR_MESSAGE, 5000);
            }
        }
    });
}

function rechercherClasse(data) {
    $.ajax({
       type:'POST',
       url:'ajax/searchClasse',
       data:{
           classe:data
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
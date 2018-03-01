var ERROR_MESSAGE = 'Une erreur s\'est produite durant l\'opération. Réessayer plus tard ou contactez l\'administrateur.';


$(document).ready(function () {
        $('#changeClasses').on('click', modifyClasses);
        $('#newClasse').on('click', addClass);
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

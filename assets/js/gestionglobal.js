$(document).ready(function () {
        $('#changeClasses').on('click', modifyClasses);
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
                    Materialize.toast('Une erreur s\'est produite durant l\'opération. Réessayer plus tard ou contactez l\'administrateur.',5000);
                }
            }
        })
    }
}
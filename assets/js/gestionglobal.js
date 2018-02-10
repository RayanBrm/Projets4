
// $(function () {
//     $('.draggable').draggable({snap:".classe_container", snapMode:"outer"});
// });
$(document).ready(function () {
        $('#nestable').nestable({maxDepth:2, group:1});
        $('#nestable2').nestable({maxDepth:2, group:1});

    $('.dd').nestable({
        reject: [
            {
                rule: function() {
                    // $(this) refers to the dragged element.
                    // Return TRUE to cancel the drag action.
                    return $(this).parent().hasClass("rootList");
                }
            }
        ]
    });
    }
);

function verifier() {
    let unassigned = $('#nestable2').nestable('serialize');
    let serial = $('#nestable').nestable('serialize');

    console.log(unassigned.length === 0,serial);

    for (let classe of serial){
        for (let chld of classe.children){
            console.log('Classe : '+ classe.id.split('_')[1] +' Eleve : '+chld.id.split('_')[1]);
        }
    }
}

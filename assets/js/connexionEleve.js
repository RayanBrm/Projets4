
function updateChild() {
    var classe = document.getElementById('classe_select').value;

    $.ajax({
        url:'ajax/getClasse/'+classe+'/log',
        type:'GET',
        success: function(response){
            $('#classe_container').html(response);
            $('.tooltipped').tooltip({delay: 50});
        }
    });
}
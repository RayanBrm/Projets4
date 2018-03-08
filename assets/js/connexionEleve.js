
function updateChild() {
    var xhr = getXHR();
    var classe = document.getElementById('classe_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Classe : "+classe);
            document.getElementById('classe_container').innerHTML = xhr.responseText;
            $('.tooltipped').tooltip({delay: 50});
        }
    };

    xhr.open("GET", "/ajax/getClasse/"+classe+"/log", true);
    xhr.send();
}
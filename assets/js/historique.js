function multiLoad() {
    loadClasse();
    loadClasseEmrunt();
}

function loadClasseEmrunt(){
    var xhr = getXHR();
    var classe = document.getElementById('classe_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            document.getElementById('emprunt_container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "/ajax/getEmprunt/"+classe+"/1", true);
    xhr.send();
}


function loadClasse() {
    var xhr = getXHR();
    var classe = document.getElementById('classe_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Classe : "+classe);
            document.getElementById('child_select').innerHTML = xhr.responseText;
            $(document).ready(function() {
                $('select').material_select();
            });
        }
    };

    xhr.open("GET", "/ajax/getClasse/"+classe+"/option", true);
    xhr.send();
}

function loadEmprunt() {
    var xhr = getXHR();
    var child = document.getElementById('child_select').value;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            document.getElementById('emprunt_container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "/ajax/getEmprunt/"+child, true);
    xhr.send();
}
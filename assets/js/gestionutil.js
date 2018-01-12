$(document).ready(function(){
    $('.modal').modal();
});


function adduser() {
    var xhr = getXHR();

    var identifiant = document.getElementById('identifiant').value;
    var mdp = document.getElementById('motdepasse').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var role = document.getElementById('role').value;

    var message = "";

    if (isCompleteForm('util')){
        document.getElementById('popup_button').addEventListener("click", refresh);

        console.log(identifiant,mdp,nom,prenom,role);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
                // callback
                if (xhr.responseText === "success"){
                    message = "<blockquote class='valid'>L'utilisateur a été ajouté</blockquote>";
                }
                else if (xhr.responseText === "failure"){
                    message = "<blockquote>Un probleme est survenue, réessayer plus tard ou contactez un administrateur.</blockquote>";
                }
            }
        };

        xhr.open("POST", "/ajax/adduser", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("identifiant="+identifiant+"&motdepasse="+motdepasse+"&prenom="+prenom+"&nom="+nom+"&role="+role);

        document.getElementById('popup_container').innerHTML = message;
        $('#modal1').modal('open');
    }
    else {
        console.log('passed');
        document.getElementById('popup_container').innerHTML = "<blockquote>Le formulaire est incomplet, veuillez le remplir</blockquote>";

        $('#modal1').modal('open');
    }

}

function refresh() {
    location.reload();
}


function emptyForm() {
    // empty ajout utilisateur form
    document.getElementById('identifiant').value = '';
    document.getElementById('motdepasse').value = '';
    document.getElementById('nom').value = '';
    document.getElementById('prenom').value = '';
    document.getElementById('role').value = '';
    // empty ajout eleve form
}

function isCompleteForm(form) {
    if (form === 'util'){
        return (document.getElementById('identifiant').value !== "" &&
            document.getElementById('motdepasse').value !== "" &&
            document.getElementById('prenom').value !== "" &&
            document.getElementById('nom').value !== "" &&
            document.getElementById('role').value !== ""
        );
    }
}
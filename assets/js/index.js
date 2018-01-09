function rechercherParTitre()
{
    var xhr = getXHR();
    var book = document.getElementById('title').value;
    console.log(book)

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Recherché : "+book);
            document.getElementById('container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "/ajax/getBookByName", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("book="+book);
}

function rechercherParAuteur()
{
    var xhr = getXHR();
    var auteur = document.getElementById('author').value;
    console.log(auteur);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Recherché : "+auteur);
            document.getElementById('container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "/ajax/getBookByAuthor", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("auteur="+auteur);
}

function rechercher()
{
    var xhr = getXHR();
    var search = document.getElementById('search').value;
    console.log(search);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // callback
            console.log("Recherché : "+search);
            document.getElementById('container').innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "/ajax/getBook", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("mot clé recherché ="+search);
}
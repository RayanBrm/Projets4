function getXHR(){
    var res = null;
    if(window.XMLHttpRequest)//firefox
        res = new XMLHttpRequest();
    else if(window.ActiveXObject)//internet explorer
        res= new ActiveXObject("Microsoft.XMLHTTP");
    //XMLHttpRequest non supporté
    return res;
}

var xhr = getXHR();

function rechercher()
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
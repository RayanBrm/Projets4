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
    alert("rechercher!");
}
// ******************************** AJAX query utilities *****************************

function getXHR() {
  var xhr = null;

  if (window.XMLHttpRequest || window.ActiveXObject) {
    if (window.ActiveXObject) {
      try {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
      } catch(e) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
    }
    else {
      xhr = new XMLHttpRequest();
    }
  }
  else {
    alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
  }
  return xhr;
}

function notify(message ,status) {
    // TODO : display bug

    if(document.getElementById('alert').firstChild){
       document.getElementById('alert').innerHTML = "";
    }

    // div alert must be created before
    //<div id=\"alert\"><a class=\"alert alert_save/alert_fail \" href=\"#alert\">Message</a></div>"
    var alrt = document.createElement('a');
    alrt.className = 'alert '+ (status ? 'alert_save' : 'alert_fail');
    alrt.href = '#alert';
    alrt.textContent = message;

    // Append the alert to the document
    document.getElementById('alert').appendChild(alrt);
}
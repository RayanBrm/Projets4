function test() {
    let isbn = document.getElementById('isbn').value;
    let dump = document.getElementById('dump');

    // $.ajax({
    //     url: ",
    //     dataType: 'jsonp',
    //     beforeSend: function (xhr) {
    //
    //     },
    //     success: function (data) {
    //         dump.innerText = data;
    //     },
    //     type: 'GET'
    // });

    var xhr = getXHR();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            console.log(JSON.parse(xhr.responseText));
        }
    };

    xhr.open("GET", "https://www.googleapis.com/books/v1/volumes/?q=isbn:"+isbn, true);
    xhr.setRequestHeader('Access-Control-Allow-Origin', 'AIzaSyAL_jvVpvMXMvlZYF35egMZ-Jrkoq6lLMY');
    xhr.send();
}
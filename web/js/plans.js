function subscribe(id) {
    console.log(id)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log('done')
        }
    };
    xhttp.open("POST", '/membership/subscribe/'+id, true);
    xhttp.send();
}
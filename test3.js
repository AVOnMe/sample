window.onload = function() { 

var url = "http://avonme.org/lib/git/quiz/curltest.php";

var obj = {
    "id": "987bksd9z8",
    "name": "Solarpanel 1",
    "power": 1.03,
    "hours_of_sunlight": 0.03
};

var queryString = "query=" + JSON.stringify(obj);
var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
if(this.readyState == 4 && this.responseText) {

document.body.innerHTML = '<pre>' + this.responseText + '</pre>';

}

}

xhr.open("POST", url, true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(queryString);


}
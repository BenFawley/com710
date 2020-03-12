
//load data from the file: data.txt when the button is clicked
document.getElementById('loadData').onclick = function () {
    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        document.getElementById("data").innerHTML = e.target.responseText;
    });
    xhttp.open("GET", "data.txt", true);
    xhttp.send();
};


//document.getElementById('loadData').onclick = function (){

   // var data = new FormData();
    //data.append("name", "Prins");

    //var xhttp = new XMLHttpRequest();
    //xhttp.addEventListener("load", e => {
       // document.getElementById("data").innerHTML = e.target.responseText;
        //document.getElementById("status").innerHTML = e.target.status;
   // });
    //xhttp.open("POST", "process.php");
    //xhttp.send(data);
//};

document.getElementById("loadJson").onclick = function(){
    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        document.getElementById("jsonData").innerHTML = JSON.parse(e.target.responseText);
    });
    xhttp.open("GET", "data.json", true);
    xhttp.send();
};

document.getElementById("loadXml").onclick = function(){
    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("load", e => {
        var xmlDoc = xhttp.
        responseXML;
        //var note = xmlDoc.getElementsByTagName("note");

        document.getElementById("xmlData").innerHTML = xmlDoc;
    });
    xhttp.open("GET", "file.xml", true);
    xhttp.send();
};



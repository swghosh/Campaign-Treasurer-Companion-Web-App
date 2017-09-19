// function puts in the passed argument text into div#table
function putInDiv(text) {
    document.querySelector('#data').innerHTML = text;
}

// returns the value of select
var selectedName = function() {
    return document.querySelector('select').value;
}
var selectedType = function() {
    return document.querySelector('select').querySelector('option[value="' + document.querySelector('select').value +'"]').id;
}

// makes an asynchronous XMLHttpRequest to external url and puts the response text into div#stocks 
var loadTable = function(uri) {
    // http request to get table of items as html
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // put the response html text in data div
            putInDiv(this.responseText);
            // abort current http request
            this.abort();
        }
    };
    // send http request
    xhttp.open("GET", uri, true);
    xhttp.send();
}

// function to load the table after loading message
var populate = function() {
    // put the response html text in data div
    putInDiv("Loading... Please check connectivity and refresh this page if this takes a long time.");
    // loads the table based on select value
    loadTable("priceupdatestable.php?name=" + selectedName() + "&type=" + selectedType());
};

// associate select onchange with poulate so as to load price updates on page
document.querySelector('select').onchange = populate;
populate();
// function puts in the passed argument text into div#data
function putInDataDiv(text) {
    document.querySelector('#data').innerHTML = text;
}
// makes an asynchronous XMLHttpRequest to external url and puts the response text into div#data 
var loadStocksInit = function(uri) {
    // http request to get table of items as html
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // put the response html text in data div
            putInDataDiv(this.responseText);
            // abort current http request
            this.abort();
            // update time with last refreshed time stamp
            updateTime();
        }
    };
    // send http request
    xhttp.open("GET", uri, true);
    xhttp.send();
}

// highlight the tr node in yellow that is provided
var highlight = function(tr) {
    tr.style.backgroundColor = 'yellow';
    tr.style.color = '#000';
}

// initially runt to populate table of stocks
var populateStocksInit = function() {
    loadStocksInit("stockstable.php");
};

// initially runt to populate table of news
var populateNews = function() {
    loadStocksInit("newstable.php");
};

// makes an asynchronous XMLHttpRequest to external url and puts the response text into div#data
var loadStocksLater = function(uri) {
    // http request to get table of items as html
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // use two divs to store currently fetched stocks table and the last refreshed table
            var ds = document.querySelector('div#data');
            var dh = document.querySelector('div#hidden');
            // replace html in dh div with ds div
            dh.innerHTML = ds.innerHTML;
            ds.innerHTML = this.responseText;
            // set id after replacing
            ds.id = "shown";
            // tr(s) of table are iterated to show change in stocks table
            var dstrs = document.querySelectorAll("div#shown table tr");
            var dhtrs = document.querySelectorAll("div#hidden table tr");
            // if there is a change in number of stocks
            if(dstrs.length == dhtrs.length) {
                // iterate and check if there is a change in a price in table after refresh
                for(var i = 0; i < dstrs.length; i++) {
                    // highlight the tr if there is a change in the price
                    if(dstrs[i].innerHTML !== dhtrs[i].innerHTML) {
                        highlight(dstrs[i]);
                    }
                }
            }
            // ds set id after replace
            ds.id = "data";
            // abort current http request
            this.abort();
            // update time with last refreshed time stamp
            updateTime();
        }
    };
    // send http request
    xhttp.open("GET", uri, true);
    xhttp.send();
};

// runt later to refresh stocks table
var populateStocksLater = function() {
    loadStocksLater("stockstable.php");
};
// changes in uri due to use from inside /masterpanel/ instead of /
// play notification.mp3 when highlight is required / price gets changed

// modify heading
document.querySelector('div.topbar h1').innerHTML = 'Campaign Treasurer | Market Overview';

// modify highlight function to also play notification sound upon change
var highlight = function(tr) {
    tr.style.backgroundColor = 'yellow';
    tr.style.color = '#000';

    var audio = new Audio('notification.mp3');
    audio.play();
}

// initially runt to load stocks table
var populateStocksInit = function() {
    loadStocksInit("../stockstable.php");
};

// later runt to refresh stocks table
var populateStocksLater = function() {
    loadStocksLater("../stockstable.php");
};

// later runt to refresh buyers table
var populateBuyers = function() {
    loadStocksInit("buyerstable.php");
};
// changes in uri due to use from inside /masterpanel/ instead of /
// play notification.mp3 when highlight is required / price gets changed

// modify heading
document.querySelector('div.topbar h1').innerHTML = 'Campaign Treasurer | Market Overview';

var highlight = function(tr) {
    tr.style.backgroundColor = 'yellow';
    tr.style.color = '#000';

    var audio = new Audio('notification.mp3');
    audio.play();
}

var populateStocksInit = function() {
    loadStocksInit("../stockstable.php");
};
var populateStocksLater = function() {
    loadStocksLater("../stockstable.php");
};

var populateBuyers = function() {
    loadStocksInit("buyerstable.php");
};
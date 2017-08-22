// changes in uri due to use from inside /masterpanel/ instead of /
// play notification.mp3 when highlight is required / price gets changed

// add a time stamp box
document.querySelector('div.topbar').querySelector('br').outerHTML = '<small class="time">' + new Date().toString() + '</small>';

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
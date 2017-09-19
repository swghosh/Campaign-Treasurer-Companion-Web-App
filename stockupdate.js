// populate stocks table initially
populateStocksInit();
// and populate stocks table refreshing every 5 seconds
var timer = setInterval(populateStocksLater, 5000);
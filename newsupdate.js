// populate news table initially
populateNews();
// and populate news table refreshing every 5 seconds
var timer = setInterval(populateNews, 5000);
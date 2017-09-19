// common script, javascript code that is to be executed on all pages

// updateTime function to update the time div with latest fetched time
var updateTime = function() {
    // the time div that contains the latest update time content and is hidden
    var hiddenTimeDiv = document.querySelector('div.hidden.time');
    // the time small node that is currently displaying last fetched time
    var smallTime = document.querySelector('small.time');
    // only if the nodes small time, hidden time above are not null
    if(hiddenTimeDiv !== null && smallTime !== null) {
        // the small time node will have inner html as the hidden time div
        smallTime.innerHTML = hiddenTimeDiv.innerHTML; 
    }
};
updateTime();
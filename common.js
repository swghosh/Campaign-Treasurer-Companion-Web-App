// common script, javascript code that is to be executed on all pages
var updateTime = function() {
    var hiddenTimeDiv = document.querySelector('div.hidden.time');
    if(hiddenTimeDiv !== null) {
        var smallTime = document.querySelector('small.time');
        smallTime.innerHTML = hiddenTimeDiv.innerHTML; 
    }
};
updateTime();
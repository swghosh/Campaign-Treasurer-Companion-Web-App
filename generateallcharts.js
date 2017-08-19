for(var key in updates) {
    var item = updates[key];
    var times = item.times;
    var values = item.values;
    
    chartGenerate(key, times, values);
    var lowestBlock = document.getElementById(key).querySelector('b.lowest');
    var highestBlock = document.getElementById(key).querySelector('b.highest');

    lowestBlock.innerHTML = '$' + item.lowest;
    highestBlock.innerHTML = '$' + item.highest;
}
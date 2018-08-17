// loop to generate multiple canvas and draw graphs on them based on item price fluctuations
for(var key in updates) {
    // iterate across item keys
    var item = updates[key];
    var times = item.times;
    var values = item.values;
    
    // generate a chart using chartGenerate function providing the array of times and values
    chartGenerate(key, times, values);

    // the b node where highest and lowest values are to be placed
    var lowestBlock = document.getElementById(key).querySelector('b.lowest');
    var highestBlock = document.getElementById(key).querySelector('b.highest');

    // add highest and lowest values to the respective b node
    lowestBlock.innerHTML = '₹' + item.lowest;
    highestBlock.innerHTML = '₹' + item.highest;
}
for(var key in updates) {
    var item = updates[key];
    var times = item.times;
    var values = item.values;
    
    chartGenerate(key, times, values);
}
// generates a chart using ChartJS to render a graph of prices and fluctuation of an individual item
var chartGenerate = function(id, labels, values) {
    // the canvas item of a specific id which will be used for chart generate
    var ctx = document.getElementById("chart " + id).getContext('2d');
    // new chartJS object with the required canvas as reference
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: labels, // labels with times
          datasets: [{
              lineTension: 0,
              label: id,
              data: values, // values with different prices of fluctuations
              backgroundColor: "rgba(100, 100, 100, 0.1)",
              borderColor: "#679"
          }]
      }
    });
};
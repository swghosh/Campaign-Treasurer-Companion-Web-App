var chartGenerate = function(id, labels, values) {
    var ctx = document.getElementById("chart " + id).getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: labels,
          datasets: [{
              lineTension: 0,
              label: id,
              data: values,
              backgroundColor: "rgba(100, 100, 100, 0.1)",
              borderColor: "#679"
          }]
      }
    });
};
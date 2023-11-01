<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<canvas id="lineChart"></canvas>

  <script>
    var labels = @json($labels);
    var linechart_data = @json($linechart_data);
    var ctx = document.getElementById("lineChart").getContext('2d');
    var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: '',
          data: linechart_data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
    function addData(chart, label, data) {
      chart.data.labels.push(label);
      chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
      });
      chart.update();
    }
    setInterval(function() {
      fetch('/readdata') // Ganti URL sesuai dengan endpoint atau route yang telah Anda buat di server-side
        .then(response => response.json())
        .then(data => {
          addData(lineChart, data['time_linechart'], data['linechart_data'])
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }, 10000);
  </script>
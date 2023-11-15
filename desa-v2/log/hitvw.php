<section class="pengunjungView">
  <h5 class="judul"><i class="fa fa-bar-chart" aria-hidden="true"></i> Statistik Pengunjung</h5>
  
  <canvas id="myChart" style="width:100%;max-width:600px; height: 175px;"></canvas>

<script>
// var xValues = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
// var yValues = [7,8,8,9,9,9,10,11,14,14,15,8,15,12,10,7,9,8,11,12,0,0,0,0,0,0,0,0,0,0,0,0];

var xValues = ['Februari','Maret','April'];
var yValues = [7,18,12];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues,
    }]
  },
  options: {plugins: {legend: {display: false}}}
});</script>




</section>
<?= $this->extend('layout/default')?>

<?= $this->section('title')?>
<title>Home UPlant</title>
<?= $this->endSection()?>

<?= $this->section('content')?> 

        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>

          <div class="section-body">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fab fa-pagelines"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Tanaman</h4>
                  </div>
                  <div class="card-body">
                    <?=countData('uplant');?>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-6 col-md-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Persentase per Kategori</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kategori Tanaman</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart2"></canvas>
                  </div>
                </div>
              </div>
            </div>

          </div>

          </div>
          </div>
          <!-- akses data tanaman -->
          <script>

          </script>

        </section>

<script>
  const labels = [
    <?php foreach ($record as $key => $value): ?>
      "<?= $value['jenis'] ?>",
    <?php endforeach ?>
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: '',
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
    ],
      borderColor: 'rgb(255, 99, 132)',
      data: [
      <?php foreach ($record as $key => $value): ?>
        <?= $value['jml_tanaman'] ?>,
      <?php endforeach ?>],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script>
var label_pie = [];
    var data_pie = [];
    var coloR = [];
     var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
    <?php foreach($record as $key => $value){ ?>
        label_pie.push("<?=$value['jenis']?>",);
        data_pie.push(<?=$value['jml_tanaman']?>,);
        coloR.push(dynamicColors());
    <?php } ?>
    var chartData = {
            labels: label_pie,
            datasets: [{
               label: 'Efficiency ',
               //strokeColor:backGround,
               backgroundColor: coloR,
               borderColor: 'rgba(200, 200, 200, 0.75)',
               //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
               hoverBorderColor: 'rgba(200, 200, 200, 1)',
               data: data_pie
            }]
         };
         var ctx2 = $("#myChart2");
         var barGraph = new Chart(ctx2, {
            type: 'pie',
            data: chartData
         })
</script>

<?= $this->endSection()?>


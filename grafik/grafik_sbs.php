<?php 
 include_once ('../function.php');
$panendenbar        = mysqli_query($con, "SELECT SUM(panen) AS panen FROM tb_sbs WHERE kecamatan = 'Denpasar Barat' Group BY bulan order by id_sbs asc");
$panendenut        = mysqli_query($con, "SELECT SUM(panen) AS panen FROM tb_sbs WHERE kecamatan = 'Denpasar Utara' Group BY bulan order by id_sbs asc");
$panendentim        = mysqli_query($con, "SELECT SUM(panen) AS panen FROM tb_sbs WHERE kecamatan = 'Denpasar Timur' Group BY bulan order by id_sbs asc");
$panendensel        = mysqli_query($con, "SELECT SUM(panen) AS panen FROM tb_sbs WHERE kecamatan = 'Denpasar Selatan' Group BY bulan order by id_sbs asc");
$bulan       = mysqli_query($con, "SELECT DISTINCT bulan, tahun FROM tb_sbs order by id_sbs asc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/Chart.js"></script>
  <title>Grafik sbs</title>
</head>
<body>
  <div class="container">
    <canvas id="chart_sbs" width="100" height="40"></canvas>
  </div>
</body>
  
</html>
<script>
    var ctx = document.getElementById("chart_sbs").getContext("2d");
    var data ={
            labels: [<?php while ($p = mysqli_fetch_array($bulan) ) {                                   
                                  echo '"' . $p['bulan'] ." ". $p['tahun'] . '",';}?>],
            datasets: [
            {
              label: "Denpasar Barat",
              backgroundColor : '#7b1e7a',
              data: [<?php while ($p = mysqli_fetch_array($panendenbar)) { 
                                      echo '"' . $p['panen'] . '",';}?>],
            },
            {
              label: "Denpasar Utara",
              backgroundColor : '#b33f62',
              data: [<?php while ($p = mysqli_fetch_array($panendenut)) { 
                                      echo '"' . $p['panen'] . '",';}?>],
            },
            {
              label: "Denpasar Timur",
              backgroundColor : '#f9564f',
              data: [<?php while ($p = mysqli_fetch_array($panendentim)) { 
                                      echo '"' . $p['panen'] . '",';}?>],
            },
            {
              label: "Denpasar Selatan",
              backgroundColor : '#f3c677',
              data: [<?php while ($p = mysqli_fetch_array($panendensel)) { 
                                      echo '"' . $p['panen'] . '",';}?>],
            }
            ]
    };

    var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
  </script>
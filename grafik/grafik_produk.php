<?php
$koneksi     = mysqli_connect("localhost", "root", "", "samijaya0_db");
$nama        = mysqli_query($koneksi, "SELECT nama_produk FROM produk order by id_produk asc");
$nama2		 = mysqli_query($koneksi, "SELECT id_produk FROM transaksi_penjualan asc");
$jml         = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlahbeli FROM transaksi_penjualan GROUP BY id_produk");
?>
    <body>

    	<script src="Chart.js/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>

        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($nama)) { echo '"' . $b['nama_produk'] . '",';}?>],
                    datasets: [{
                            label: 'Jumlah Pembelian',
                            data: [<?php while ($p = mysqli_fetch_array($jml)) { echo '"' . $p['jumlahbeli'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
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
        </script>
    </body>

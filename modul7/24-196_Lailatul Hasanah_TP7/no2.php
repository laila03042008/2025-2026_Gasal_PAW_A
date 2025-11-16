<?php
require "koneksiDB.php";

$from = $_GET['from'] ?? '';
$to   = $_GET['to'] ?? '';

if ($from == '' || $to == '') {
    die("<h2>Silakan pilih tanggal dulu pada filter.php</h2>");
}

$query = "SELECT waktu_transaksi, SUM(total) AS total_harian FROM transaksi 
WHERE waktu_transaksi BETWEEN '$from' AND '$to' GROUP BY waktu_transaksi ORDER BY waktu_transaksi ASC";

$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];

foreach ($result as $row) {
    $tanggal[] = $row['waktu_transaksi'];
    $total_harga[] = $row['total_harian'];
}

$totalQuery = "SELECT COUNT(DISTINCT pelanggan_id) AS total_pelanggan, SUM(total) AS total_pendapatan
    FROM transaksi WHERE waktu_transaksi BETWEEN '$from' AND '$to'";

$execTotal = mysqli_query($conn, $totalQuery);
$summary = mysqli_fetch_assoc($execTotal);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>

    <style>
        body { font-family: Arial; margin: 20px; }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #fccbf9ff;
            padding: 10px;
            font-weight: bold;
            border: 1px solid #aaa;
        }

        td {
            padding: 8px;
            border: 1px solid #aaa;
        }

        .total-box {
            margin-top: 20px;
            width: 350px;
            padding: 15px;
            background: #f9ddf5ff;
            border: 1px solid #f8cff8ff;
            border-radius: 8px;
        }

        .kotak {                                                                
            padding: 2px 5px;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
        }

        .kotak-kembali {
            background-color: #12089eff; 
        }

        .cetak {
            background-color: #e17110ff; 
            width: 80px;
            height: 27px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h2>Rekap Laporan Penjualan</h2>
    <h3><?= date("Y-m-d", strtotime($from)) ?> sampai <?= date("Y-m-d", strtotime($to)) ?></h3>

    <a href="filter.php" class="kotak kotak-kembali">Kembali</a><br><br>
    <button onclick="window.print()" class="cetak">🖨️ Cetak</button>
    <button onclick="window.location='export_excel.php'" class="cetak">🖨️ Excel</button>
    <canvas id="chart" style="width:100%; max-width:800px"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart("chart", {
            type: "bar",
            data: {
                labels: <?= json_encode($tanggal) ?>,
                datasets: [{
                    label: 'Total',
                    data: <?= json_encode($total_harga) ?>,
                    backgroundColor: 'rgba(249, 69, 204, 0.4)',
                    borderColor: 'gray',
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>

    <table>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>

        <?php 
        $no = 1;
        foreach($result as $row): 
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>RP. <?= number_format($row['total_harian'], 0, ',', '.') ?></td>
            <td><?= date("d M Y", strtotime($row['waktu_transaksi'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="total-box">
        <table>
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <tr>
                <td><h3><?= $summary['total_pelanggan'] ?> Orang</h3></td>
                <td><h3>RP. <?= number_format($summary['total_pendapatan'], 0, ',', '.') ?></h3></td>
            </tr>
        </table>
    </div>

</body>
</html>
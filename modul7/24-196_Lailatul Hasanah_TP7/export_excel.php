<?php
require "koneksiDB.php";

$query = "SELECT t.id, DATE(t.waktu_transaksi) AS tanggal, SUM(td.harga) AS total_harga 
          FROM transaksi t JOIN transaksi_detail td ON t.id = td.transaksi_id 
          GROUP BY t.id, DATE(t.waktu_transaksi) ORDER BY t.waktu_transaksi ASC";

$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$total_pelanggan  = count($result);
$total_pendapatan = array_sum(array_column($result, 'total_harga'));

$tanggal_awal  = $result[0]['tanggal'] ?? "-";
$tanggal_akhir = end($result)['tanggal'] ?? "-";

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Rekap_Penjualan.xls");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        h2 { 
          font-size: 20px; 
          margin: 0; 
        }

        h3 { 
          font-size: 14px; 
          margin: 5px 0 15px 0; 
        }

        table {
          border-collapse: collapse;
          font-family: Arial;
        }

        th, td {
          border: 1px solid #000;
          padding: 6px 10px;
        }

        th {
          background: #ffb3d9; 
          font-weight: bold;
        }

        .no-border td {
          border: none;
          padding: 4px;
        }
    </style>
</head>
<body>
    <h2>Rekap Laporan Penjualan</h2>
    <h3><?= $tanggal_awal ?> sampai <?= $tanggal_akhir ?></h3><br>

    <table>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($result as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>RP. <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
            <td><?= date("d-M-Y", strtotime($row['tanggal'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </table><br>

    <table>
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td><b><?= $total_pelanggan ?> Orang</b></td>
            <td><b>RP. <?= number_format($total_pendapatan, 0, ',', '.') ?></b></td>
        </tr>
    </table>
</body>
</html>
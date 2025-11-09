<?php
require 'koneksiDB.php';

$query = "SELECT * FROM nota";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Nota</title>
    <style>
        body { font-family: Arial; }
        h2 { color: #3f9bebff; }
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cde2f9;
        }
        .kotak {
            padding: 2px 5px;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }
        .kotak-detail {
            background-color: #e96310ff; 
        }
        .kotak-hapus {
            background-color: #d40f0fff; 
        }
        a {
           background-color: #28a745;
           padding: 5px 8px;
           color: #fff;
           border-radius: 5px;
           text-decoration: none;
           font-size : 16px
        }
    </style>
</head>
<body>
    <h2>Data Nota</h2>
    <a href="tambah_data_nota.php">Tambah Data</a><br><br>  

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Nota</th>
            <th>Kode Supplier</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['kode_nota']}</td>
                    <td>{$row['supplier_id']}</td>
                    <td>{$row['total']}</td>
                    <td>
                        <a href='detail_barang.php?id={$row['id_nota']}' class='kotak kotak-detail'>Detail Barang</a>
                        <a href='hapus_nota.php?id={$row['id_nota']}' class='kotak kotak-hapus' onclick=\"return confirm('Hapus data ini?');\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
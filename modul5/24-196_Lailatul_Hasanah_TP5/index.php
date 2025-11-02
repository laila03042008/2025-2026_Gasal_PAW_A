<?php
require 'koneksiDB.php';

// ambil data dari tabel supplier
$query = "SELECT * FROM supplier";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
    <style>
        body {
            font-family: Arial;
        }
        h2 {
            color: #3f9bebff;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid;
            padding: 10px;
        }
        th {
            background-color: #d3eafeff;
        }
        .kotak {
            padding: 2px 5px;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }
        .kotak-edit {
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
    <h2>Data Master Supplier 
        <a href="tambah_data.php" style="margin-left : 400px">Tambah Data</a>
    </h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['telp']}</td>
                    <td>{$row['alamat']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='kotak kotak-edit'>Edit</a>
                        <a href='hapus.php?id={$row['id']}' class='kotak kotak-hapus' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>

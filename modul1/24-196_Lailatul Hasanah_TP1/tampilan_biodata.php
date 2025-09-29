<?php
$host = "localhost";
$user = "root"; 
$pass = "";     
$db   = "biodata"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);
$result = mysqli_query($koneksi, "SELECT * FROM data");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampil Biodata</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #0077b6; color: #fff; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Biodata</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Email</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['email']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

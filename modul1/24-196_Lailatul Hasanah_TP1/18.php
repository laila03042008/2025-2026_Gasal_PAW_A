<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
            margin: 20px auto;
        }
        td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $nama = "Lailatul Hasanah";
    $nim = "240411100196";
    $jurusan = "Teknik Informatika";
    $alamat = "Dsn Buncellep Utara";
    $email = "hasanahlailatul112@gmail.com";
    ?>

    <h2 style="text-align:center;">Biodata</h2>
    <table>
        <tr>
            <td>Nama</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><?php echo $jurusan; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
    </table>
</body>
</html>
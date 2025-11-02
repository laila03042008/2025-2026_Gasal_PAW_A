<?php
require 'koneksiDB.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    mysqli_query($conn, $query);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>
    <style>
        a {
           background-color: #f00505ff;
           padding: 5px 8px;
           color: #fff;
           border-radius: 5px;
           text-decoration: none;
           font-size : 17px
        }
        .submit {
            background-color: #6ee848ff;
            padding: 5px 8px;
            color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Tambah Data Supplier</h2>

    <form method="post">
        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label>Telepon:</label>
        <input type="text" name="telp" required><br><br>

        <label>Alamat:</label>
        <textarea name="alamat" rows="1" required></textarea><br><br>

        <input class="submit" type="submit" name="simpan" value="Simpan">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

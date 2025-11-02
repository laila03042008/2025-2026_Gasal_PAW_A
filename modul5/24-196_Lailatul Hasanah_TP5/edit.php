<?php
require 'koneksiDB.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
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
    <h2>Edit Data Supplier</h2>
    
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $row['nama'] ?>"><br><br>

        <label>Telepon:</label>
        <input type="text" name="telp" value="<?= $row['telp'] ?>"><br><br>

        <label>Alamat:</label>
        <textarea name="alamat" rows="1"><?= $row['alamat'] ?></textarea><br><br>

        <input class="submit" type="submit" name="update" value="Update">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

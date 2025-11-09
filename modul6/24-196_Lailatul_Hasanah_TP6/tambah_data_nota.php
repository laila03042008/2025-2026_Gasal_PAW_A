<?php
require 'koneksiDB.php';

$supplierQuery = mysqli_query($conn, "SELECT id, nama FROM supplier");

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $kode_nota = $_POST['kode_nota'];
    $supplier = $_POST['supplier_id']; 
    $total = $_POST['total'];

    $query = "INSERT INTO nota (tanggal, kode_nota, supplier_id, total) VALUES ('$tanggal', '$kode_nota', '$supplier', '$total')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nota</title>
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
    <h2>Tambah Data Nota</h2>

    <form method="post">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required><br><br>

        <label>Kode Nota:</label>
        <input type="text" name="kode_nota" required><br><br>

        <label>Supplier:</label>
        <select name="supplier_id" required>
            <option value="">-- Pilih Supplier --</option>
            <?php while ($s = mysqli_fetch_assoc($supplierQuery)) : ?>
                <option value="<?= $s['id'] ?>"><?= $s['nama'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Total:</label>
        <input type="text" name="total" required><br><br>

        <input class="submit" type="submit" name="simpan" value="Simpan">
        <a href="nota.php">Batal</a>
    </form>
</body>
</html>
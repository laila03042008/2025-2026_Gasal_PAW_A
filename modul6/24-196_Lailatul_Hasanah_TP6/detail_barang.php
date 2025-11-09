<?php
require 'koneksiDB.php';

if (!isset($_GET['id'])) {
    die("ID nota tidak ditemukan di URL!");
}

$id_nota = intval($_GET['id']);
$nota = mysqli_query($conn, "SELECT * FROM nota WHERE id_nota=$id_nota");
$data_nota = mysqli_fetch_assoc($nota);

if (!$data_nota) {
    die("Data nota tidak ditemukan!");
}   

if (isset($_POST['tambah'])) {
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id = $barang_id");
    $data_barang = mysqli_fetch_assoc($barang);

    if (!$data_barang) {
        die("Barang tidak ditemukan!");
    }

    $harga = $data_barang['harga'];
    $subtotal = $qty * $harga;

    mysqli_query($conn, "INSERT INTO detail_nota (nota_id, barang_id, qty, harga, subtotal) VALUES ($id_nota, $barang_id, $qty, $harga, $subtotal)");

    mysqli_query($conn, "UPDATE nota SET total = (SELECT SUM(subtotal) FROM detail_nota WHERE nota_id = $id_nota) WHERE id_nota = $id_nota");

    header("Location: detail_barang.php?id=$id_nota");
    exit;
}

$detail = mysqli_query($conn, "
    SELECT d.*, b.kode_barang, b.nama_barang 
    FROM detail_nota d 
    JOIN barang b ON d.barang_id = b.id 
    WHERE d.nota_id = $id_nota
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang Nota <?= $data_nota['kode_nota'] ?></title>
    <style>
        body { font-family: Arial; }
        h2 { color: #3f9bebff; }
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
        }
        th {
            background-color: #cde2f9;
        }
        input, select {
            padding: 4px;
        }
        .submit {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
        }
        a {
            background-color: #d40f0fff;
            padding: 6px 10px;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Detail Barang - Nota <?= $data_nota['kode_nota'] ?></h2>
    <p>Tanggal: <?= $data_nota['tanggal'] ?> | Supplier ID: <?= $data_nota['supplier_id'] ?></p>

    <form method="post">
        <h3>Tambah Barang ke Nota</h3>
        <label>Pilih Barang:</label>
        <select name="barang_id" required>
            <option value="">-- Pilih Barang --</option>
            <?php
            $barang = mysqli_query($conn, "SELECT * FROM barang");
            while ($b = mysqli_fetch_assoc($barang)) {
                echo "<option value='{$b['id']}'>{$b['kode_barang']} - {$b['nama_barang']}</option>";
            }
            ?>
        </select>
        <label>Qty:</label>
        <input type="number" name="qty" required min="1">
        <input type="submit" name="tambah" value="Tambah" class="submit">
    </form>

    <h3>Daftar Barang di Nota</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $no = 1;
        $total = 0;
        while ($row = mysqli_fetch_assoc($detail)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['kode_barang']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['qty']}</td>
                    <td>" . number_format($row['harga'], 0, ',', '.') . "</td>
                    <td>" . number_format($row['subtotal'], 0, ',', '.') . "</td>
                  </tr>";
            $no++;
            $total += $row['subtotal'];
        }
        ?>
        <tr>
            <th colspan="5">Total</th>
            <th><?= number_format($total, 0, ',', '.') ?></th>
        </tr>
    </table>

    <br>
    <a href="index.php">Kembali ke Nota</a>
</body>
</html>
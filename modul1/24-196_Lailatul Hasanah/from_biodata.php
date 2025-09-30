<?php
$host = "localhost";
$user = "root"; 
$pass = "";     
$db   = "biodata";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// input bidata
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $nim     = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];
    $email   = $_POST['email'];

    $sql = "INSERT INTO data (name, nim, jurusan, alamat, email) 
            VALUES ('$name', '$nim', '$jurusan', '$alamat', '$email')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<p style='color:green'>Data berhasil disimpan!</p>";
        echo '<a href="tampilan_biodata.php">lihat dafta biodata</a>';
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata</title>
</head>
<body>
    <h2>Input Biodata</h2>
    <form method="post">
        Nama: <input type="text" name="name" required><br><br>
        NIM: <input type="text" name="nim" required><br><br>
        Jurusan: <input type="text" name="jurusan"><br><br>
        Alamat: <textarea name="alamat"></textarea><br><br>
        Email: <input type="email" name="email"><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
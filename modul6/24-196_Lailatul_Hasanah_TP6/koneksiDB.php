<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "penjualan";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "koneksi sukses";
?>
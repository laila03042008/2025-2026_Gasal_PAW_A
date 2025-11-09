<?php
require 'koneksiDB.php';
$id_nota = $_GET['id'];
mysqli_query($conn, "DELETE FROM nota WHERE id_nota = '$id_nota'");
header("Location: index.php");
exit;
?>
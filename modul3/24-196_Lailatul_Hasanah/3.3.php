<?php
$height = [
    "Andy" => "176", 
    "Barry" => "165", 
    "Charlie" => "170",
];
$weighit = [
    "Haldi" => "162",
    "Ken" => "167",
    "Alen" => "170",
];

// Mengambil semua nilai dalam array (tanpa kunci)
$values = array_values($weighit);

// Menampilkan data kedua (indeks 1 karena dimulai dari 0)
echo "Data kedua dari array weighit adalah: Ken " . $values[1];
?>
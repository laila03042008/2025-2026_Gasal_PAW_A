<?php
$height = [
    "Andy" => "176", 
    "Barry" => "165", 
    "Charlie" => "170",
];
$tambah = [
    "Kalea" => 165,
    "Hani"  => 175,
    "Ceni"  => 155,
    "Heli"  => 159,
    "Rani"  => 160
];

$height = array_merge($height, $tambah);

// Menampilkan data terakhir
array_pop($height);

$keys = array_keys($height); // ambil semua key
$lastKey = end($keys);        // ambil key terakhir
echo "Nilai terakhir $lastKey: " . $height[$lastKey] . " cm tall";
?>
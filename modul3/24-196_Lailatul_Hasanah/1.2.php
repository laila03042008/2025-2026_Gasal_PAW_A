<?php
$fruits = [
    "Avocado", 
    "Blueberry", 
    "Cherry",
];
array_push($fruits, "mangga", "jeruk", "apple", "melon", "anggur");

array_pop($fruits); // menghapus
echo "Indeks tertinggi: " . (count($fruits) - 1). "<br>";
echo "Data terakhir: " . $fruits[count($fruits) - 1];
?>

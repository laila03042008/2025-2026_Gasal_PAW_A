<?php
$fruits = [
    "Avocado", 
    "Blueberry", 
    "Cherry",
];
array_push($fruits, "mangga", "jeruk", "apple", "melon", "anggur");

$vegies = [
    "buah", 
    "warna", 
    "objek",
];

foreach($vegies as $v) {
    echo $v . "<br>";
}

array_pop($fruits); // menghapus
?>
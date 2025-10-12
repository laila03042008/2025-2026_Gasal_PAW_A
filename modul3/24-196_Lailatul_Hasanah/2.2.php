<?php
$fruits = [
    "Avocado", 
    "Blueberry", 
    "Cherry",
];
$vegias = [
    "apple", 
    "melon", 
    "anggur",
];
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
    echo $vegias[$x];
    echo "<br>";
};
?>
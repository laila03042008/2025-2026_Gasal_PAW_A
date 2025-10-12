<?php
$fruits = [
    "Avocado", 
    "Blueberry", 
    "Cherry",
];
array_push($fruits, "mangga", "jeruk", "apple", "melon", "anggur",);
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
};

echo "Jumlah data: " . (count($fruits) - 1). "<br>";
?>
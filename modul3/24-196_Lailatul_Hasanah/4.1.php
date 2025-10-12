<?php
$height = [
    "Andy"=>"176", 
    "Barry"=>"165", 
    "Charlie"=>"170",
];
$tambah = [
    "Kalea" => "165",
    "Hani"  => "175",
    "Ceni"  => "155",
    "Heli"  => "159",
    "Rani"  => "160",
];

$height = array_merge($height, $tambah);

foreach($height as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
};
?>
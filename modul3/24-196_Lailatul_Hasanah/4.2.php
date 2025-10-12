<?php
$height = [
    "Andy"=>"176", 
    "Barry"=>"165", 
    "Charlie"=>"170",
];
$weight = [
    "Ceni" => "155",
    "Heli" => "159",
    "Rani" => "160",
];

foreach($weight as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
};
?>
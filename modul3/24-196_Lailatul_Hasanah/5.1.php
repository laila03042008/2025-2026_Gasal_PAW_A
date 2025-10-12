<?php
$students = [
    [
        "Alex",
        "220401",
        "0812345678",
    ],
    [
        "Bianca",
        "220402",
        "0812345687",
    ],
    [
        "Candice",
        "220403",
        "0812345665",
    ],
];
array_push($students,
    [
        "Lani",
        "220404",
        "0873982706",
    ],
    [
        "Rani",
        "220405",
        "0853782975",
    ],
    [
        "Andre",
        "220406",
        "0824635791",
    ],
    [
        "Rendra",
        "220407",
        "0896785347",
    ],
    [
        "Cuna",
        "220408",
        "0842765378",
    ],
);

for ($row = 0; $row < 8; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>
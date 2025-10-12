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

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Mobile</th>
     </tr>";

// Menampilkan isi array ke dalam tabel
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}
?>
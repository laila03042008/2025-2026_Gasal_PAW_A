<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<h3>Data yang berhasil dikirim:</h3>";

        if (isset($_POST['nama'])) {
            $nama = htmlspecialchars($_POST['nama']);
        } else {
            $nama = 'Tidak ada';
        }
        echo "Surname: <b>" . $nama . "</b><br>";

        if (isset($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $email = 'Tidak ada';
        }
        echo "Email: <b>" . $email . "</b><br>";

        if (isset($_POST['nim'])) {
            $nim = htmlspecialchars($_POST['nim']);
        } else {
            $nim = 'Tidak ada';
        }
        echo "NIM: <b>" . $nim . "</b><br>";

        if (isset($_POST['password'])) {
            $password = htmlspecialchars($_POST['password']);
        } else {
            $password = 'Tidak ada';
        }
        echo "Password: <b>" . $password . "</b><br>";
    }
?>
</body>
</html>
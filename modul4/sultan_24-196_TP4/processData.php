<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<h3>Data yang berhasil dikirim:</h3>";

        if (isset($_POST['surname'])) {
            $surname = htmlspecialchars($_POST['surname']);
        } else {
            $surname = 'Tidak ada';
        }
        echo "Surname: <b>" . $surname . "</b><br>";

        if (isset($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $email = 'Tidak ada';
        }
        echo "Email: <b>" . $email . "</b>";
    }
?>
</body>
</html>
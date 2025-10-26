<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'validate.inc';

    // Validasi hanya jika field diisi
    if (!empty($_POST['nama'])) {
        validateName($_POST, 'nama', $errors);
    }
    if (!empty($_POST['email'])) {
        validateEmail($_POST, 'email', $errors);
    }
    if (!empty($_POST['nim'])) {
        validateNIM($_POST, 'nim', $errors);
    }
    if (!empty($_POST['password'])) {
        validatePassword($_POST, 'password', $errors);
    }


    if ($errors) {
        echo '<h3>Error!!!!!</h3>';
        foreach ($errors as $field => $error) {
            echo "$error<br>";
        }
        include 'form.inc';
    } elseif (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['nim']) || !empty($_POST['password'])) {
        // Ada input dan tidak ada error
        echo '<p>Form submitted successfully with no errors!</p>';
        include 'processData.php';
    } else {
        // Submit tapi semua kosong → tampilkan form lagi tanpa pesan
        include 'form.inc';
    }
} else {
  
    include 'form.inc';
}
?>
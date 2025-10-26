<?php
function validateName($field_list, $field_name, &$errors) {
    if (!empty($field_list[$field_name]) && !preg_match("/^[a-zA-Z'-]+$/", $field_list[$field_name])) {
        $errors[$field_name] = ucfirst($field_name) . " hanya boleh huruf alfabet";
    }
}

function validateEmail($field_list, $field_name, &$errors) {
    if (!empty($field_list[$field_name]) && !filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format " . $field_name . " tidak valid";
    }
}

function validateNIM($field_list, $field_name, &$errors) {
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = ucfirst($field_name) . " wajib diisi";
    } elseif (!preg_match("/^[0-9]{8}$/", $field_list[$field_name])) {
        $errors[$field_name] = "Format " . $field_name . " tidak valid (harus 8 angka)";
    }
}

function validatePassword($field_list, $field_name, &$errors) {
    $value = trim($field_list[$field_name]);
    if (!empty($value) && !preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $value)) {
        $errors[$field_name] = "Format " . $field_name . " tidak valid (harus huruf dan angka, min 6 karakter)";
    }
}
?>
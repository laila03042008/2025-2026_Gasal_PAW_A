<?php
function validateName($field_list, $field_name, &$errors) {
    if (!empty($field_list[$field_name]) && !preg_match("/^[a-zA-Z' -]+$/", $field_list[$field_name])) {
        $errors[$field_name] = ucfirst($field_name) . " hanya boleh huruf alfabet";
    }
}

function validateEmail($field_list, $field_name, &$errors) {
    if (!empty($field_list[$field_name]) && !filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format " . $field_name . " tidak valid";
    }
}
?>
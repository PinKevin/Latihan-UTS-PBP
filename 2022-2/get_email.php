<?php
require_once('db_login.php');

$email = $db->real_escape_string($_GET['email']);

$query = "SELECT * FROM pengguna WHERE email = '$email'";
$result = $db->query($query);
if (!$result) {
    die('Tidak bisa menjalankan query');
} else {
    if ($result->num_rows == 0) {
        echo 'Email tersedia';
    } else {
        echo 'Email telah digunakan';
    }
}

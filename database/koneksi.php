<?php 
$server = 'localhost';
$user_db = 'root';   // root
$password_db = ''; // ''
$db_name = 'db_jurnal_unuha';

$koneksi = new mysqli($server, $user_db, $password_db, $db_name);

if ($koneksi->connect_error) {
    die("<script>alert('Tidak tersambung dengan database')</script>");
}

?>
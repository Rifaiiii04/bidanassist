<?php
// Konfigurasi database
$host = 'localhost'; // Host database (biasanya localhost)
$username = 'root'; // Username database (default: root)
$password = ''; // Password database (default: kosong)
$dbname = 'db_bidanassist'; // Nama database (ubah sesuai dengan nama database Anda)

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}
?>

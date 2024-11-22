<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'db_bidanassist'; 

$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}
?>

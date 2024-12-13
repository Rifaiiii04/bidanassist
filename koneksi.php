<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'db_bidanassist'; 

$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}


try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_bidanassist", "root", ""); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>

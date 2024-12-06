<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $hubungan = $_POST['hubungan'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO data_pasien (user_id, hubungan, nama, umur, no_telp, alamat) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ississ', $user_id, $hubungan, $nama, $umur, $no_telp, $alamat);

    if ($stmt->execute()) {
        header('Location: lihat_data_p.php?status=success');
    } else {
        header('Location: tambah_data_p.php?status=error');
    }
}
?>

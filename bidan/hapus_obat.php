<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM obat WHERE ID_obat = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: manajemen_obat.php');
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}
?>

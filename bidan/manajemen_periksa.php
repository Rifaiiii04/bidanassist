<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}
include '../koneksi.php';

// Ambil data pemeriksaan dari database
$query = "SELECT * FROM pemeriksaan";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pemeriksaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
        * {
            font-family: "Poppins", sans-serif;
        }
        .header {
            background-color: #99b3f6;
            height: 150px;
            border-radius: 0 0 20px 20px;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
        }
        .add-button {
            background-color: #a3f9a2;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            color: black;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .add-button:hover {
            background-color: #89e38a;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="kelola.php" class="back-button">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h1>Manajemen Pemeriksaan</h1>
    </div>
    <div class="container">
        <h2 class="text-center">Daftar Pemeriksaan</h2>
        <table>
            <tr>
                <th>ID Pemeriksaan</th>
                <th>Nama Pemeriksaan</th>
                <th>Harga</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id_pemeriksaan'] ?></td>
                <td><?= $row['nama_pemeriksaan'] ?></td>
                <td><?= $row['harga_periksa'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <div class="text-center">
            <a href="tambah_periksa.php" class="add-button">Tambah Pemeriksaan Baru</a>
        </div>
    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pemeriksaan = $_POST['nama_pemeriksaan'];
    $harga_periksa = $_POST['harga_periksa'];

    $query = "INSERT INTO pemeriksaan (nama_pemeriksaan, harga_periksa) 
              VALUES ('$nama_pemeriksaan', $harga_periksa)";
    if (mysqli_query($conn, $query)) {
        header('Location: manajemen_periksa.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan pemeriksaan: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemeriksaan</title>
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
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: white;
            text-decoration: none;
        }
        .form-container {
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            max-width: 500px;
        }
        .form-container label {
            font-weight: 500;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="manajemen_periksa.php" class="back-button">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h1>Tambah Pemeriksaan</h1>
    </div>
    <div class="container form-container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_pemeriksaan" class="form-label">Nama Pemeriksaan:</label>
                <input type="text" name="nama_pemeriksaan" id="nama_pemeriksaan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga_periksa" class="form-label">Harga Pemeriksaan:</label>
                <input type="number" name="harga_periksa" id="harga_periksa" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>

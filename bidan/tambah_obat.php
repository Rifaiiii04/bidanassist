<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_obat = $_POST['nama_obat'];
    $jenis_obat = $_POST['jenis_obat'];
    $jumlah = $_POST['jumlah'];
    $harga_obat = $_POST['harga_obat'];
    $subtotal_obat = $jumlah * $harga_obat;

    $query = "INSERT INTO obat (nama_obat, jenis_obat, jumlah, harga_obat, subtotal_obat) 
              VALUES ('$nama_obat', '$jenis_obat', $jumlah, $harga_obat, $subtotal_obat)";
    if (mysqli_query($conn, $query)) {
        header('Location: manajemen_obat.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan obat: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
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
        <a href="manajemen_obat.php" class="back-button">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h1>Tambah Obat</h1>
    </div>
    <div class="container form-container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat:</label>
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_obat" class="form-label">Jenis Obat:</label>
                <select name="jenis_obat" id="jenis_obat" class="form-control" required>
                    <option value="Tablet">Tablet</option>
                    <option value="Sirup">Sirup</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga_obat" class="form-label">Harga Obat:</label>
                <input type="number" name="harga_obat" id="harga_obat" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>

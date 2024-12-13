<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}

// Include connection file
include "../koneksi.php";

// Fetch pemeriksaan data
$pemeriksaanQuery = "SELECT id_pemeriksaan, nama_pemeriksaan, harga_periksa FROM pemeriksaan";
$pemeriksaanResult = $conn->query($pemeriksaanQuery);

// Fetch obat data
$obatQuery = "SELECT ID_obat, nama_obat, harga_obat, jenis_obat FROM obat";
$obatResult = $conn->query($obatQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pemeriksaan dan Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }
        .form-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f0f8ff;
            border: 1px solid #cce7ff;
            border-radius: 8px;
        }
        .item input {
            margin-right: 10px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background-color: #ff4c4c;
        }
        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .back-link img {
            margin-right: 8px;
        }
        .section-title {
            margin-top: 40px;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="daftar_antrian.php" class="back-link">
        <img src="https://img.icons8.com/material-rounded/24/000000/back.png" alt="Back">
        Kembali ke Daftar Antrian
    </a>
    <h1>Pemeriksaan dan Obat</h1>
    <form method="post" action="resep.php">
        <!-- Pemeriksaan Section -->
        <div class="section-title">Jenis Pemeriksaan</div>
        <div class="form-section">
            <?php while ($row = $pemeriksaanResult->fetch_assoc()): ?>
                <div class="item">
                    <span>
                        <input type="checkbox" name="pemeriksaan[]" value="<?php echo $row['id_pemeriksaan']; ?>">
                        <?php echo $row['nama_pemeriksaan']; ?>
                    </span>
                    <span>Rp <?php echo number_format($row['harga_periksa'], 0, ',', '.'); ?></span>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Obat Section -->
        <div class="section-title">Pilih Obat</div>
        <div class="form-section">
            <?php while ($row = $obatResult->fetch_assoc()): ?>
                <div class="item">
                    <span>
                        <input type="checkbox" name="obat[]" value="<?php echo $row['ID_obat']; ?>">
                        <?php echo $row['nama_obat']; ?> (<?php echo $row['jenis_obat']; ?>)
                    </span>
                    <span>Rp <?php echo number_format($row['harga_obat'], 0, ',', '.'); ?></span>
                </div>
            <?php endwhile; ?>
        </div>

        <button type="submit" class="btn">Selanjutnya</button>
    </form>
</div>
</body>
</html>

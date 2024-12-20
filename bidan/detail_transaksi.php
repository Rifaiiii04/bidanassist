<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}

include "../koneksi.php";

$pemeriksaan = $_SESSION['pemeriksaan'] ?? [];
$obat = $_SESSION['obat'] ?? [];
$dosis = $_SESSION['dosis'] ?? [];
$instruksi = $_SESSION['instruksi'] ?? [];
$tanggal_pemeriksaan = $_SESSION['tanggal_pemeriksaan'] ?? date('Y-m-d');

$total_harga_periksa = 0;
$nama_pemeriksaan = [];
foreach ($pemeriksaan as $id) {
    $pemeriksaanQuery = "SELECT nama_pemeriksaan, harga_periksa FROM pemeriksaan WHERE id_pemeriksaan = ?";
    $stmt = $conn->prepare($pemeriksaanQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $nama_pemeriksaan[] = $row['nama_pemeriksaan'];
        $total_harga_periksa += $row['harga_periksa'];
    }
}

$total_harga_obat = 0;
$nama_obat = [];
foreach ($obat as $id) {
    $obatQuery = "SELECT nama_obat, harga_obat FROM obat WHERE ID_obat = ?";
    $stmt = $conn->prepare($obatQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $nama_obat[] = $row['nama_obat'];
        $total_harga_obat += $row['harga_obat'];
    }
}

$total_bayar = $total_harga_periksa + $total_harga_obat;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
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
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ececec;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .btn-print {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Detail Transaksi</h1>

    <div class="form-section">
        <h3>Tanggal Pendaftaran</h3>
        <div class="item">
            <span><?php echo date('d-m-Y', strtotime($tanggal_pemeriksaan)); ?></span>
        </div>
    </div>

    <div class="form-section">
        <h3>Jenis Pemeriksaan</h3>
        <?php foreach ($nama_pemeriksaan as $pemeriksaan_item): ?>
            <div class="item">
                <span><?php echo $pemeriksaan_item; ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-section">
        <h3>Obat yang Dipilih</h3>
        <?php foreach ($nama_obat as $index => $obat_item): ?>
            <div class="item">
                <span><?php echo $obat_item; ?></span>
                <span>Rp <?php echo number_format($total_harga_obat, 0, ',', '.'); ?></span>
            </div>
            <div class="item">
                <span>Dosis: <?php echo $dosis[$obat[$index]] ?? ''; ?></span>
                <span>Instruksi: <?php echo $instruksi[$obat[$index]] ?? ''; ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-section">
        <h3>Total Bayar</h3>
        <div class="item">
            <span>Total Pemeriksaan</span>
            <span>Rp <?php echo number_format($total_harga_periksa, 0, ',', '.'); ?></span>
        </div>
        <div class="item">
            <span>Total Obat</span>
            <span>Rp <?php echo number_format($total_harga_obat, 0, ',', '.'); ?></span>
        </div>
        <div class="item">
            <span><strong>Total Bayar</strong></span>
            <span><strong>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></strong></span>
        </div>
    </div>

    <a href="daftar_transaksi.php" class="btn btn-primary">Kembali</a>
    <a href="javascript:void(0)" class="btn-print" onclick="printPage()">Cetak</a>
</div>

</body>
</html>

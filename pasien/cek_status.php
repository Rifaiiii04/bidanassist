<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Query untuk mengambil informasi pasien dan status pendaftaran
$query = "SELECT dp.nama, dp.umur, dp.no_telp, dp.alamat, p.tanggal_pemeriksaan, 
          p.tinggi_badan, p.berat_badan, p.suhu, p.tekanan_darah, p.keluhan, p.id AS no_antrian, 
          CASE 
              WHEN p.tanggal_pemeriksaan IS NULL THEN 'Belum Pemeriksaan'
              ELSE 'Dalam Pemeriksaan'
          END AS status
          FROM data_pasien dp
          LEFT JOIN pendaftaran p ON dp.id = p.id_pasien
          WHERE dp.user_id = ?
          ORDER BY p.created_at DESC LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    $error_message = "Tidak ada data pendaftaran ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pemeriksaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .header {
            background-color: #99b3f6;
            height: 100px;
            border-radius: 0 0 20px 20px;
            position: relative;
        }
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: black;
            background-color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-back:hover {
            background-color: #dddddd;
        }
        .status-box {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .status-box .card {
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
            text-align: center;
        }
        .card-green {
            background-color: #d4edda;
            color: #155724;
        }
        .card-red {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="header">
    <a href="javascript:history.back()" class="btn-back">&larr;</a>
    <div class="d-flex justify-content-center">
        <h2 class="text-center">Status Pemeriksaan</h2>
    </div>
</div>

<div class="container mt-5">
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php else: ?>
        <div class="row mb-3">
            <div class="col-6">Nama</div>
            <div class="col-6">: <?php echo $data['nama']; ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Umur</div>
            <div class="col-6">: <?php echo $data['umur']; ?> Tahun</div>
        </div>
        <div class="row mb-3">
            <div class="col-6">No Telp</div>
            <div class="col-6">: <?php echo $data['no_telp']; ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Alamat</div>
            <div class="col-6">: <?php echo $data['alamat']; ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Tanggal Pemeriksaan</div>
            <div class="col-6">: <?php echo $data['tanggal_pemeriksaan']; ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Tinggi Badan</div>
            <div class="col-6">: <?php echo $data['tinggi_badan']; ?> cm</div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Berat Badan</div>
            <div class="col-6">: <?php echo $data['berat_badan']; ?> Kg</div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Suhu</div>
            <div class="col-6">: <?php echo $data['suhu']; ?> Celsius</div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Tekanan Darah</div>
            <div class="col-6">: <?php echo $data['tekanan_darah']; ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-6">Keluhan</div>
            <div class="col-6">: <?php echo $data['keluhan']; ?></div>
        </div>
        <div class="status-box">
            <div class="card card-green">No Antrian <?php echo $data['no_antrian']; ?></div>
            <div class="card card-red">Status: <?php echo $data['status']; ?></div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>

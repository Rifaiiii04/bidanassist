<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

// Proses form pendaftaran
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $tanggal_pemeriksaan = $_POST['tanggal_pemeriksaan'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $suhu = $_POST['suhu'];
    $tekanan_darah = $_POST['tekanan_darah'];
    $keluhan = $_POST['keluhan'];

    // Periksa jika data tidak kosong
    if (!empty($tanggal_pemeriksaan) && !empty($tinggi_badan) && !empty($berat_badan) && !empty($suhu) && !empty($tekanan_darah) && !empty($keluhan)) {
        // Insert data ke tabel pendaftaran
        $query = "INSERT INTO pendaftaran (id_pasien, tanggal_pemeriksaan, tinggi_badan, berat_badan, suhu, tekanan_darah, keluhan) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issddss", $_SESSION['user_id'], $tanggal_pemeriksaan, $tinggi_badan, $berat_badan, $suhu, $tekanan_darah, $keluhan);

        if ($stmt->execute()) {
            // Jika berhasil, arahkan ke dashboard pasien
            header('Location: dashboard_pasien.php');
            exit;
        } else {
            $error_message = "Terjadi kesalahan saat pendaftaran.";
        }
    } else {
        $error_message = "Semua field harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        .form-control {
            background-color: #B0C4FF;
            border: none;
        }
        .btn-primary {
            background-color: #FF7171;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
        }
        .btn-primary:hover {
            background-color: #ff5252;
        }
    </style>
</head>
<body>

    <div class="header">
        <a href="javascript:history.back()" class="btn-back">&larr;</a>
        <div class="d-flex justify-content-center">
            <h2 class="text-center mb-4">Form Pendaftaran Pemeriksaan</h2>
        </div>
    </div>

    <div class="container mt-5">
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="pendaftaran.php" method="POST">
            <div class="mb-3">
                <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" required>
            </div>
            <div class="mb-3">
                <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
            </div>
            <div class="mb-3">
                <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                <input type="number" step="0.1" class="form-control" id="berat_badan" name="berat_badan" required>
            </div>
            <div class="mb-3">
                <label for="suhu" class="form-label">Suhu (°C)</label>
                <input type="number" step="0.1" class="form-control" id="suhu" name="suhu" required>
            </div>
            <div class="mb-3">
                <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
                <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" required>
            </div>
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Daftar Pemeriksaan</button>
            </div>
        </form>
    </div>

</body>
</html>

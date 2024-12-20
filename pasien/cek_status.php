<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

// Ambil ID dari parameter URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID tidak valid!');
}

$id = intval($_GET['id']); // Validasi ID untuk menghindari SQL Injection

// Query untuk mengambil data dari tabel `pendaftaran`
$query = "SELECT id, nama_pasien, tanggal_pemeriksaan, tinggi_badan, berat_badan, suhu, tekanan_darah, keluhan, status
          FROM pendaftaran 
          WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah data ditemukan
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    die('Data tidak ditemukan!');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d9e7ff;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h1 {
            text-align: center;
            background-color: #8cbfff;
            color: white;
            padding: 15px;
            margin: 0;
        }
        .details {
            padding: 20px;
        }
        .details p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }
        .details p span {
            font-weight: bold;
        }
        .status {
            padding: 20px;
            background-color: #f4f4f9;
            text-align: center;
        }
        .status p {
            font-size: 18px;
            color: #333;
        }
        .status span {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
        }
        .status .belum-lunas {
            background-color: #f44336;
        }
        .status .lunas {
            background-color: #4CAF50;
        }
        .antrian {
            text-align: center;
            margin: 20px 0;
            font-size: 20px;
            color: #333;
        }
        .antrian span {
            display: inline-block;
            padding: 10px 20px;
            background-color: #d4f8d4;
            border: 1px solid #6bcf6b;
            border-radius: 8px;
            font-weight: bold;
        }
        .button-back {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            width: 80%;
            text-transform: uppercase;
        }
        .button-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pemeriksaan</h1>

        <!-- Nomor Antrian -->
        <div class="antrian">
            <p>No Antrian: <span><?php echo htmlspecialchars($data['id']); ?></span></p>
        </div>

        <div class="details">
            <p><span>Nama:</span> <?php echo htmlspecialchars($data['nama_pasien'] ?: 'Tidak tersedia'); ?></p>
            <p><span>Tanggal Pemeriksaan:</span> <?php echo htmlspecialchars($data['tanggal_pemeriksaan'] ?: 'Tidak tersedia'); ?></p>
            <p><span>Tinggi Badan:</span> <?php echo htmlspecialchars($data['tinggi_badan'] ?: 'Tidak tersedia'); ?> cm</p>
            <p><span>Berat Badan:</span> <?php echo htmlspecialchars($data['berat_badan'] ?: 'Tidak tersedia'); ?> kg</p>
            <p><span>Suhu:</span> <?php echo htmlspecialchars($data['suhu'] ?: 'Tidak tersedia'); ?> &deg;C</p>
            <p><span>Tekanan Darah:</span> <?php echo htmlspecialchars($data['tekanan_darah'] ?: 'Tidak tersedia'); ?></p>
            <p><span>Keluhan:</span> <?php echo htmlspecialchars($data['keluhan'] ?: 'Tidak tersedia'); ?></p>
        </div>

        <div class="status">
            <p><span class="<?php echo strtolower(str_replace(' ', '-', $data['status'])); ?>">
                <?php echo htmlspecialchars($data['status']); ?>
            </span></p>
        </div>

        <a href="dashboard_pasien.php" class="button-back">Kembali ke Dashboard</a>
    </div>
</body>
</html>

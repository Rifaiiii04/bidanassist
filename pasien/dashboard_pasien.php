<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

// Query untuk mengambil data pendaftaran berdasarkan ID pasien
$query = "SELECT pendaftaran.id, pendaftaran.tanggal_pemeriksaan, pendaftaran.tinggi_badan, pendaftaran.berat_badan, pendaftaran.suhu, pendaftaran.tekanan_darah, pendaftaran.keluhan
          FROM pendaftaran
          WHERE pendaftaran.id_pasien = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Debugging: Cek hasil query
// echo 'User ID: ' . $_SESSION['user_id'];  // Tampilkan ID user
// echo '<pre>';
// print_r($result->fetch_all(MYSQLI_ASSOC));  // Tampilkan hasil query dalam format array
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }

        ul li:hover {
            background-color: #ff7171;
            border-radius: 5px;
        }

        .welcome {
            text-align: center;
            width: 500px;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <header style="background-color: #99b3f6; height: 170px; border-radius: 0 0 20px 20px;">
        <nav style="margin-right: 15vh">
            <ul class="d-flex flex gap-5 justify-content-center" style="list-style: none; font-weight: bold">
                <li><a href="#" class="text-decoration-none" style="color: black">Beranda</a></li>
                <li><a href="kontak.php" class="text-decoration-none" style="color: black">Kontak</a></li>
                <li><a href="akun.php" class="text-decoration-none" style="color: black">Akun</a></li>
            </ul>
        </nav>
        <div class="welcome">
            <h2 class="d-flex">Hai, <?php echo htmlspecialchars($_SESSION['nama_depan']); ?>!</h2>
            <h3 class="d-flex">Selamat Datang di BIDAN ASSIST</h3>
        </div>
    </header>

    <main>
        <div class="container text-center mt-5">
            <?php if ($result->num_rows > 0): ?>
                <div class="d-flex flex-column align-items-center mt-4">
                    <h4>Riwayat Pemeriksaan Anda:</h4>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID Pendaftaran</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Tinggi Badan</th>
                                <th>Berat Badan</th>
                                <th>Suhu</th>
                                <th>Tekanan Darah</th>
                                <th>Keluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tanggal_pemeriksaan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tinggi_badan']); ?> cm</td>
                                    <td><?php echo htmlspecialchars($row['berat_badan']); ?> kg</td>
                                    <td><?php echo htmlspecialchars($row['suhu']); ?> °C</td>
                                    <td><?php echo htmlspecialchars($row['tekanan_darah']); ?></td>
                                    <td><?php echo htmlspecialchars($row['keluhan']); ?></td>
                                    <td><a href='cek_status.php?id=" . $row['id_pendaftaran'] . "' class='btn btn-info btn-sm'>Cek Status</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="d-flex flex-column align-items-center mt-4">
                    <img src="../img/nothing.png" alt="Tanda Tanya" style="max-width: 200px;">
                    <p class="mt-3">Anda Belum Melakukan Riwayat Pemeriksaan</p>
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="tambah_data_p.php" class="btn btn-success px-4 py-2">Tambah Data Pasien</a>
                <a href="pendaftaran.php" class="btn btn-danger px-4 py-2">Pendaftaran</a>
                <a href="lihat_data_p.php" class="btn btn-success px-4 py-2">Lihat Data Pasien</a>
            </div>
        </div>
    </main>
</body>
</html>

<?php $conn->close(); ?>

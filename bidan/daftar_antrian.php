<?php
// Include file koneksi database
require '../koneksi.php';

// Query untuk mendapatkan data antrian
$sql = "
    SELECT 
        pendaftaran.id AS id_antrian,
        pendaftaran.nama_pasien AS nama_pasien,
        pendaftaran.tanggal_pemeriksaan,
        pendaftaran.keluhan,
        pendaftaran.tinggi_badan,
        pendaftaran.berat_badan,
        pendaftaran.suhu,
        pendaftaran.tekanan_darah
    FROM 
        pendaftaran
    JOIN 
        data_pasien ON pendaftaran.id_pasien = data_pasien.id
    ORDER BY 
        pendaftaran.tanggal_pemeriksaan DESC
";

// Eksekusi query
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d9e7ff;
        }
        .container {
            width: 95%;
            max-width: 1200px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn-cek-status {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-cek-status:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cek Antrian</h1>

        <table>
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Keluhan</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Suhu</th>
                    <th>Tekanan Darah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_antrian']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_pemeriksaan']); ?></td>
                    <td><?php echo htmlspecialchars($row['keluhan']); ?></td>
                    <td><?php echo htmlspecialchars($row['tinggi_badan']); ?> cm</td>
                    <td><?php echo htmlspecialchars($row['berat_badan']); ?> kg</td>
                    <td><?php echo htmlspecialchars($row['suhu']); ?> &deg;C</td>
                    <td><?php echo htmlspecialchars($row['tekanan_darah']); ?></td>
                    <td>
                    <a href="'#'" class="btn-cek-status">Tambah Pemeriksaan</a>
                    </td>

                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin: 20px;">
        <a href="dashboard.php" class="btn-cek-status">Kembali ke Dashboard</a>
    </div>
</body>
</html>

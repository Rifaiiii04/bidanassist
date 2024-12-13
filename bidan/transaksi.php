<?php
session_start();
include "../koneksi.php";

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query SQL untuk mengambil data transaksi dan detail terkait
$query = "
    SELECT 
        t.ID_transaksi,
        t.tanggal_transaksi,
        t.total_harga AS total_transaksi,
        pendaftaran.nama_pasien,
        pendaftaran.tanggal_pemeriksaan,
        pendaftaran.keluhan,
        pemeriksaan.nama_pemeriksaan,
        pemeriksaan.harga_periksa,
        obat.nama_obat,
        obat.harga_obat,
        obat.jenis_obat
    FROM 
        transaksi t
    LEFT JOIN 
        resep r ON t.ID_resep = r.ID_resep
    LEFT JOIN 
        pendaftaran ON r.ID_pasien = pendaftaran.id
    LEFT JOIN 
        pemeriksaan ON pemeriksaan.id_pemeriksaan = pendaftaran.id
    LEFT JOIN 
        obat ON r.ID_obat = obat.ID_obat
";

// Eksekusi query
$result = $conn->query($query);

// Cek jika terjadi error pada query
if (!$result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d1d8e0; /* Biru Coklat Lembut */
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #6666FFFF; /* Merah muda */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #6666FFFF; /* Merah muda border */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #6666FFFF; /* Merah muda */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f0f3f5;
        }

        tr:hover {
            background-color: #ffccff; /* Efek hover pink terang */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .btn-back {
            display: inline-block;
            background-color: #6666FFFF; /* Merah muda */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }

        .btn-back:hover {
            background-color: #6666FFFF; /* Merah muda gelap */
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #999;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="dashboard.php" class="btn-back">Kembali ke Dashboard</a>

    <h1>Data Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pasien</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Keluhan</th>
                <th>Nama Pemeriksaan</th>
                <th>Harga Pemeriksaan</th>
                <th>Nama Obat</th>
                <th>Harga Obat</th>
                <th>Jenis Obat</th>
                <th>Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['ID_transaksi']; ?></td>
                        <td><?php echo $row['tanggal_transaksi']; ?></td>
                        <td><?php echo $row['nama_pasien']; ?></td>
                        <td><?php echo $row['tanggal_pemeriksaan']; ?></td>
                        <td><?php echo $row['keluhan']; ?></td>
                        <td><?php echo $row['nama_pemeriksaan']; ?></td>
                        <td>Rp <?php echo number_format($row['harga_periksa'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['nama_obat']; ?></td>
                        <td>Rp <?php echo number_format($row['harga_obat'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['jenis_obat']; ?></td>
                        <td>Rp <?php echo number_format($row['total_transaksi'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr class="no-data">
                    <td colspan="11">Tidak ada data transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
// Free result set
$result->free();

// Close connection
$conn->close();
?>

</body>
</html>

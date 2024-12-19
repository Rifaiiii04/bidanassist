<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}

include "../koneksi.php";

// Inisialisasi variabel untuk pencarian
$search = $_GET['search'] ?? '';
$query = "SELECT id, nama_pasien, tanggal_pemeriksaan, status 
          FROM pendaftaran 
          WHERE nama_pasien LIKE ? OR tanggal_pemeriksaan LIKE ?";

$stmt = $conn->prepare($query);
$searchTerm = '%' . $search . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Fungsi untuk memperbarui status transaksi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $updateQuery = "UPDATE pendaftaran SET status = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("si", $status, $id);
    $stmtUpdate->execute();

    // Refresh halaman setelah update
    header("Location: daftar_transaksi.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ececec;
            text-align: center;
        }
        th {
            background-color: #f9fafb;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-lunas {
            background-color: #4CAF50;
            color: white;
        }
        .btn-belum-lunas {
            background-color: #f44336;
            color: white;
        }
        .btn-detail {
            background-color: #2196F3;
            color: white;
        }
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-search {
            padding: 8px 15px;
            border: none;
            background-color: #2196F3;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Transaksi</h1>

    <form class="search-form" method="GET" action="daftar_transaksi.php">
        <input type="text" name="search" class="search-input" placeholder="Cari nama pasien atau tanggal (YYYY-MM-DD)" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn-search">Cari</button>
    </form>

    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Tanggal Pendaftaran</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['tanggal_pemeriksaan'])); ?></td>
                    <td><?php echo $row['status'] ?? 'Belum Lunas'; ?></td>
                    <td>
                        <div class="action-buttons">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="status" value="Lunas">
                                <button type="submit" name="update_status" class="btn btn-lunas">Lunas</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="status" value="Belum Lunas">
                                <button type="submit" name="update_status" class="btn btn-belum-lunas">Belum Lunas</button>
                            </form>
                            <a href="detail_transaksi.php?id=<?php echo $row['id']; ?>" class="btn btn-detail">Detail</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada data transaksi</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-primary">Kembali ke Dashboard</a>
</div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
    header('Location: ../login.php');
    exit;
}

include "../koneksi.php";

// Dummy pasien ID (gunakan session atau parameter sebenarnya)
$id_pasien = $_SESSION['id_pasien'] ?? 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedObat = isset($_POST['obat']) ? $_POST['obat'] : [];
}

// Fetch selected obat for display
$obatData = [];
if (!empty($selectedObat)) {
    $obatIds = implode(',', array_map('intval', $selectedObat));
    $obatQuery = "SELECT ID_obat, nama_obat, harga_obat FROM obat WHERE ID_obat IN ($obatIds)";
    $result = $conn->query($obatQuery);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $obatData[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resep</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
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
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        input[type="text"] {
            width: 60%;
            padding: 8px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Resep</h1>
    <form method="post" action="transaksi.php">
        <div class="form-section">
            <h2>Instruksi dan Dosis</h2>
            <?php foreach ($obatData as $obat): ?>
                <div class="item">
                    <span><?php echo $obat['nama_obat']; ?> (Rp <?php echo number_format($obat['harga_obat'], 0, ',', '.'); ?>)</span>
                    <input type="hidden" name="obat_ids[]" value="<?php echo $obat['ID_obat']; ?>">
                    <input type="text" name="dosis[<?php echo $obat['ID_obat']; ?>]" placeholder="Masukkan dosis">
                    <input type="text" name="instruksi[<?php echo $obat['ID_obat']; ?>]" placeholder="Masukkan instruksi">
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn">Simpan Resep</button>
    </form>
</div>
</body>
</html>

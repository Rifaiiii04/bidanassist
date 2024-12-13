<!-- <?php
include "../koneksi.php";

// Fetch transactions with patient details from pendaftaran
$query = "
    SELECT t.ID_transaksi, p.nama_pasien, t.tanggal_transaksi, t.status_pembayaran
    FROM transaksi t
    JOIN pendaftaran p ON t.id_pendaftaran = p.id
    ORDER BY t.tanggal_transaksi DESC
";

$result = $conn->query($query);

if ($result === false) {
    // Output the error message if the query fails
    echo "Error: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <style>
        /* Styling for the page */
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
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Transaksi</h1>

    <div class="form-section">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="item">
                    <span><?php echo $row['nama_pasien']; ?></span>
                    <span><?php echo $row['tanggal_transaksi']; ?></span>
                    <span><?php echo $row['status_pembayaran']; ?></span>
                    <a href="detail_transaksi.php?id=<?php echo $row['ID_transaksi']; ?>">Detail</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No transactions found.</p>
        <?php endif; ?>
    </div>

</div>

</body>
</html> -->

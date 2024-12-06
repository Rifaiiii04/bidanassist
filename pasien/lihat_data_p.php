<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM data_pasien WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Data Pasien</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

      * {
        font-family: "Poppins", sans-serif;
      }

      header {
        background-color: #99b3f6;
        height: 170px;
        border-radius: 0 0 20px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
      }

      .welcome {
        text-align: center;
      }

      .back-button {
        position: absolute;
        top: 10px;
        left: 10px;
      }

      table {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        margin-top: 20px;
      }

      th {
        background-color: #99b3f6;
        color: white;
        text-align: center;
      }

      td, th {
        padding: 10px;
        text-align: center;
      }

      img {
        max-width: 200px;
      }

      .empty-data {
        text-align: center;
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <header>
      <a href="dashboard_pasien.php" class="btn btn-light back-button">
        <ion-icon name="arrow-back-outline"></ion-icon> Kembali
      </a>
      <h3 class="welcome">Daftar Data Pasien</h3>
    </header>
    <main>
      <div class="container mt-5">
        <?php if ($result->num_rows > 0): ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Hubungan</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>No Telepon</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['hubungan']); ?></td>
                  <td><?= htmlspecialchars($row['nama']); ?></td>
                  <td><?= htmlspecialchars($row['umur']); ?></td>
                  <td><?= htmlspecialchars($row['no_telp']); ?></td>
                  <td><?= htmlspecialchars($row['alamat']); ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="empty-data">
            <img src="../img/nothing.png" alt="Tanda Tanya">
            <p class="mt-3">Anda Belum Mempunyai Data Pasien Di akun Anda</p>
          </div>
        <?php endif; ?>
      </div>
    </main>
  </body>
</html>

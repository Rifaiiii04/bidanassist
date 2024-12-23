<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM account WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
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
       @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap");

      * {
        font-family: "Poppins";
      }
      body {
        background-color: #c3d1f9;
      }
      .content {
        background-color: #d3e0f7;
        padding: 20px;
        border-radius: 10px;
        max-width: 800px;
        margin: 20px auto;
      }
      .profile {
        text-align: center;
        margin-bottom: 20px;
      }
      table {
        width: 100%;
        margin-top: 20px;
      }
      table td {
        padding: 10px;
        vertical-align: top;
      }
      .btn-logout {
        display: block;
        margin: 30px auto 0;
        width: 150px;
      }
    </style>
</head>
<body>
<header style="background-color: #99b3f6; height: 170px; border-radius: 0 0 20px 20px;">
      <div>
        <img src="#" alt="" />
      </div>
      <nav style="margin-right: 15vh">
        <ul
          class="d-flex flex gap-5 justify-content-center"
          style="list-style: none; font-weight: bold"
        >
          <li>
            <a href="dashboard.php" class="text-decoration-none" style="color: black"
              >Beranda</a
            >
          </li>
          <li>
            <a href="kontak.php" class="text-decoration-none" style="color: black"
              >Kontak</a
            >
          </li>
          <li>
            <a href="akun.php" class="text-decoration-none" style="color: black"
              >Akun</a
            >
          </li>
        </ul>
      </nav>
      <div class="profile d-flex justify-content-center align-items-center">
        <div class="" style="border:3px solid black;border-radius: 50%; background-color:#99b336"><img src="..//img/bidanassist.png" alt="Profile" style="width: 90px;"></div>
      </div>
    </header>
    <div class="content mt-4">
      <div class="operational-hours">
    <table>
        <tr>
            <td>Nama Depan: </td>
            <td><?php echo htmlspecialchars($user['nama_depan']); ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap: </td>
            <td><?php echo htmlspecialchars($user['nama_lengkap']); ?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <tr>
            <td>No Telp: </td>
            <td><?php echo htmlspecialchars($user['notelp']); ?></td>
        </tr>
        <tr>
            <td>Alamat: </td>
            <td><?php echo htmlspecialchars($user['alamat']); ?></td>
        </tr>
        <tr>
            <td>Umur: </td>
            <td><?php echo htmlspecialchars($user['umur']); ?> Tahun</td>
        </tr>
    </table>
    <form action="logout.php" class="d-flex justify-content-center align-items-center mt-5">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin keluar?')">Log Out</button>
    </form>
</div>
    </div>
</body>
</html>

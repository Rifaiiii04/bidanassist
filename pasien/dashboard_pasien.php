<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'pasien') {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
    <header style="background-color: #99b3f6; height: 170px; border-radius
    : 0 0 20px 20px;">
      <nav style="margin-right: 15vh">
        <ul
          class="d-flex flex gap-5 justify-content-center"
          style="list-style: none; font-weight: bold"
        >
          <li>
            <a href="#" class="text-decoration-none" style="color: black">Beranda</a>
          </li>
          <li>
            <a href="kontak.php" class="text-decoration-none" style="color: black">Kontak</a>
          </li>
          <li>
            <a href="akun.php" class="text-decoration-none" style="color: black">Akun</a>
          </li>
        </ul>
      </nav>
      <div class="welcome">
        <h2 class="d-flex">Hai, <?php echo htmlspecialchars($_SESSION['nama_depan']); ?>!</h2>
        <h3 class="d-flex">Selamat Datang di BIDAN ASSIST</h3>
      </div>
    </header>
    <main>
      <div class="container text-center mt-5">
        <div class="d-flex flex-column align-items-center mt-4">
          <img src="../img/nothing.png" alt="Tanda Tanya" style="max-width: 200px;">
          <p class="mt-3">Anda Belum Melakukan Riwayat Pemeriksaan</p>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-4">
          <a href="tambah_data_p.php" class="btn btn-success px-4 py-2">Tambah Data Pasien</a>
          <a href="#" class="btn btn-danger px-4 py-2">Pendaftaran</a>
          <a href="#" class="btn btn-success px-4 py-2">Lihat Data Pasien</a>
        </div>
      </div>
    </main>
  </body>
</html>

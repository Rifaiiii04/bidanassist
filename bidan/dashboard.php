<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'bidan') {
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
    <!-- CDN -->
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
    <!-- CDN -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      * {
        font-family: "Poppins";
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
      <div>
        <img src="#" alt="" />
      </div>
      <nav style="margin-right: 15vh">
        <ul
          class="d-flex flex gap-5 justify-content-center"
          style="list-style: none; font-weight: bold"
        >
          <li>
            <a href="#" class="text-decoration-none" style="color: black"
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
      <div class="welcome">
    <h2 class="d-flex">Hai,Bidan <?php echo htmlspecialchars($_SESSION['nama_depan']); ?></h2>
    <h3 class="d-flex">Selamat Datang di BIDAN ASSIST</h3>
</div>
    </header>
    <main>
      <div class="container text-center mt-4">
        <h1 class="mt-2">Operasional Klinik</h1>
        <div class="main mt-5 d-flex flex-wrap justify-content-center gap-4">
          <div class="card col-12 col-sm-4 col-md-3">
            <div class="card-body">
              <a href="daftar_antrian.php" class="btn btn-danger">
                <img src="../img/DaftarAntrian.png" alt="" style="max-width: 100px" />
                <br />
                <span>Daftar Antrian</span>
              </a>
            </div>
          </div>
          <div class="card col-12 col-sm-4 col-md-3">
            <div class="card-body">
              <a href="#" class="btn btn-danger">
                <img src="../img/kelolaKlinik.png" alt="" style="max-width: 100px" />
                <br />
                <span>Kelola Klinik</span>
              </a>
            </div>
          </div>
          <div class="card col-12 col-sm-4 col-md-3">
            <div class="card-body">
              <a href="#" class="btn btn-danger">
                <img src="../img/Transaksi.png" alt="" style="max-width: 100px" />
                <br />
                <span>Transaksi</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

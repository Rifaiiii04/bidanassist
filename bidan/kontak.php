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
       @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      * {
        font-family: "Poppins";
      }
      body {
        background-color: #c3d1f9;
      }
      
      .content {
        background-color: #c3d1f9;
        padding: 20px;
        border-radius: 10px;
        max-width: 800px;
        margin: auto;
      }

      ul li:hover {
        background-color: #ff7171;
        border-radius: 5px;
      }

      .operational-hours, .social-media {
        margin-top: 20px;
        padding: 20px;
        background-color: #d3e0f7;
        border-radius: 10px;
      }

      .social-media .icon-link {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 10px 0;
      }

      .social-media img {
        width: 40px;
        height: 40px;
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
            <a href="index.php" class="text-decoration-none" style="color: black"
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
        <h2 class="d-flex">Hai,Admin</h2>
        <h3 class="d-flex">Silahkan isi Jadwal dan Kontak</h3>
      </div>
    </header>

    <!-- Main Content -->
    <div class="content mt-4">
      <!-- Operational Hours Section -->
      <div class="operational-hours">
        <h3>Jam Operasional</h3>
        <div>
          <strong>Hari:</strong>
          <span class="badge bg-danger">Senin</span>
          <span class="badge bg-danger">Selasa</span>
          <span class="badge bg-danger">Rabu</span>
          <span class="badge bg-danger">Kamis</span>
          <span class="badge bg-danger">Jumat</span>
          <span class="badge bg-danger">Sabtu</span>
          <span class="badge bg-danger">Minggu</span>
        </div><br>
        <div>
          <strong>Buka:</strong> <input type="text" value="08.00" readonly class="form-control d-inline w-auto">
        </div><br>
        <div>
          <strong>Tutup:</strong> <input type="text" value="21.00" readonly class="form-control d-inline w-auto">
        </div>
      </div>

      <!-- Social Media Section -->
      <!-- <div class="social-media">
        <h3>Sosial Media</h3>
        <div class="icon-link">
          <img src="../img/instagram-icon.png" alt="Instagram Icon">
          <input type="text" value="LINK -" readonly class="form-control w-auto">
        </div>
        <div class="icon-link">
          <img src="../img/facebook-icon.png" alt="Facebook Icon">
          <input type="text" value="LINK -" readonly class="form-control w-auto">
        </div>
        <div class="icon-link">
          <img src="../img/maps-icon.png" alt="Maps Icon">
          <input type="text" value="LINK -" readonly class="form-control w-auto">
        </div>
        <div class="icon-link">
          <img src="../img/whatsapp-icon.png" alt="WhatsApp Icon">
          <input type="text" value="LINK -" readonly class="form-control w-auto">
        </div>
      </div> -->
    </div>
</body>
</html>

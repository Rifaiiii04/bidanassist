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
    <title>Tambah Data Pasien</title>
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
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .header {
        background-color: #99b3f6;
        height: 100px;
        border-radius: 0 0 20px 20px;
        position: relative;
      }
      .btn-back {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 24px;
        color: black;
        background-color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      }
      .btn-back:hover {
        background-color: #dddddd;
      }
      .form-control {
        background-color: #B0C4FF;
        border: none;
      }
      .btn-submit {
        background-color: #FF7171;
        border: none;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 18px;
      }
      .btn-submit:hover {
        background-color: #ff5252;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <a href="javascript:history.back()" class="btn-back">&larr;</a>
      <div class="d-flex justify-content-center"><h2 class="text-center mb-4">Tambah Data Pasien</h2></div>
    </div>
    <div class="container mt-5">
      <form method="post" action="proses_tambah_data.php">
        <div class="mb-3">
          <label for="hubungan" class="form-label">Hubungan Dengan Pemilik Akun</label>
          <select class="form-select form-control" id="hubungan" name="hubungan" required>
            <option value="" selected disabled>Pilih Hubungan</option>
            <option value="Ibu">Ibu</option>
            <option value="Anak">Anak</option>
            <option value="Ayah">Ayah</option>
            <option value="Kerabat">Kerabat</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required />
        </div>
        <div class="mb-3">
          <label for="umur" class="form-label">Umur</label>
          <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur" required />
        </div>
        <div class="mb-3">
          <label for="no_telp" class="form-label">No Telepon</label>
          <input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No Telepon" required />
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3" required></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-submit">Tambah</button>
        </div>
      </form>
    </div>
  </body>
</html>

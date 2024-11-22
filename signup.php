<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi.php';

    // Ambil data dari form
    $nama_depan = mysqli_real_escape_string($conn, $_POST['nama_depan']);
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $notelp = mysqli_real_escape_string($conn, $_POST['notelp']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $umur = mysqli_real_escape_string($conn, $_POST['umur']);

    // Check if email already exists
    $check_email = mysqli_query($conn, "SELECT email FROM account WHERE email = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        // Query untuk insert data
        $sql = "INSERT INTO account (nama_depan, nama_lengkap, email, password, notelp, role, alamat, umur) 
                VALUES ('$nama_depan', '$nama_lengkap', '$email', '$password', '$notelp', '$role', '$alamat', '$umur')";

        if (mysqli_query($conn, $sql)) {
            header('Location: login.php');
            exit;
        } else {
            $error = "Gagal mendaftar: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body style="background-color: #99b3f6">
<div class="d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column align-items-center" style="background-color: #c2d1fa; border-radius: 16px; min-height: 90vh; width: 80%; margin-top: 5vh; margin-bottom: 5vh; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 class="mt-4" style="font-weight: bold; font-size: 24px">Sign Up</h1>
        <?php if (isset($error)) : ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" style="width: 300px">
            <input type="text" name="nama_depan" class="form-control mb-2" placeholder="Nama Depan" required>
            <input type="text" name="nama_lengkap" class="form-control mb-2" placeholder="Nama Lengkap" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <input type="text" name="notelp" class="form-control mb-2" placeholder="Nomor Telepon" required>
            <textarea name="alamat" class="form-control mb-2" placeholder="Alamat" required></textarea>
            <input type="number" name="umur" class="form-control mb-2" placeholder="Umur" required>
            <select name="role" class="form-select mb-2">
                <option value="bidan">Bidan</option>
                <option value="pasien">Pasien</option>
            </select>
            <button type="submit" class="btn btn-danger w-100">Sign Up</button>
        </form>
        <p class="mt-3 mb-4">Sudah punya akun? <a href="login.php" style="color: #ff6b6b; font-weight: bold">Login di sini</a></p>
    </div>
</div>
</body>
</html>
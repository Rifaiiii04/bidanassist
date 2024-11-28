<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'bidan') {
        header('Location: bidan/dashboard.php');
    } else {
        header('Location: dashboard_pasien.php');
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama_depan'] = $user['nama_depan'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'bidan') {
                header('Location: bidan/dashboard.php');
            } else {
                header('Location: pasien/dashboard_pasien.php');
            }
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body style="background-color: #99b3f6">
<a href="roleselection.php"><button class="btn btn-danger">Back</button></a>
<div class="d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column align-items-center" style="background-color: #c2d1fa; border-radius: 16px; height: 75vh; width: 80%; margin-top: 10vh; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
    <img src="img/bidanassist.png" alt="" style="width: 250px; position:relative;">
    <div style="position: relative; bottom:13vh;">
        <h1 class="mt-5" style="font-weight: bold; font-size: 24px">Login</h1>
        <?php if (isset($error)) : ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" style="width: 300px">
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" class="btn btn-danger w-100">Login</button>
        </form>
        <p class="mt-3">Belum punya akun? <a href="signup.php" style="color: #ff6b6b; font-weight: bold">Sign Up di sini!</a></p>
    </div>
</div>
</div>
</body>
</html>

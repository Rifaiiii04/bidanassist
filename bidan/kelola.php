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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
        * {
            font-family: "Poppins", sans-serif;
        }
        .header {
            background-color: #99b3f6;
            height: 150px;
            border-radius: 0 0 20px 20px;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .menu-link {
            display: block;
            background-color: #a3f9a2;
            border: none;
            padding: 15px;
            border-radius: 10px;
            width: 100%;
            text-align: left;
            font-size: 18px;
            font-weight: 500;
            color: black;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            margin-bottom: 15px;
        }
        .menu-link:hover {
            background-color: #89e38a;
            cursor: pointer;
        }
        .menu-icon {
            margin-right: 10px;
            font-size: 24px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="dashboard.php" class="back-button">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </a>
        <h1>Kelola Klinik</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="manajemen_obat.php" class="menu-link">
                    <ion-icon name="medkit-outline" class="menu-icon"></ion-icon>
                    Manajemen Obat
                </a>
                <a href="manajemen_periksa.php" class="menu-link">
                    <ion-icon name="clipboard-outline" class="menu-icon"></ion-icon>
                    Manajemen Pemeriksaan
                </a>
            </div>
        </div>
    </div>
</body>
</html>

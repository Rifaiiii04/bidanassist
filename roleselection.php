<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Role Selection</title>
</head>
<body style="background-color: #99b3f6">
<div class="d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column align-items-center" style="background-color: #c2d1fa; border-radius: 16px; height: 75vh; width: 80%; margin-top: 10vh; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
            <img src="img/bidanassist.png" alt="" style="width: 250px; position:relative; top:10vh;">
        <h1 class="mt-5" style="font-weight: bold; font-size: 24px">Log in Sebagai :</h1>
        <form action="" style="width: 300px">
            <a href="login.php?role=bidan" style="text-decoration: none; color: white;">
                <button type="button" class="btn" style="background-color: #ff6b6b; color: white; width: 100%; font-weight: bold;">Bidan</button>
            </a>
            <a href="login.php?role=pasien" style="text-decoration: none; color: white;">
                <button type="button" class="btn mt-3" style="background-color: #ff6b6b; color: white; width: 100%; font-weight: bold;">Pasien</button>
            </a>
        </form>
    </div>
</div>
</body>
</html>

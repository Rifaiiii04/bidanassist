<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Sign Up</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      * {
        font-family: "Poppins";
      }
    </style>
  </head>
  <body style="background-color: #99b3f6">
    <div class="d-flex justify-content-center align-items-center">
      <div
        class="container d-flex flex-column align-items-center"
        style="
          background-color: #c2d1fa;
          border-radius: 16px;
          height: 113vh;
          width: 80%;
          box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        "
      >
        <div>
          <a
            href="role_selection.html"
            class="position-absolute top-0 start-0 m-3"
            style="color: #ff6b6b; font-weight: bold; text-decoration: none"
            ><ion-icon name="arrow-back" size="large"></ion-icon
          ></a>
        </div>
        <div class="position-relative mt-5">
          <img
            src="img/bidanassist.png"
            alt="Bidan Assist Logo"
            style="
              width: 100px;
              height: 100px;
              background-color: white;
              border-radius: 50%;
            "
          />
          <p
            class="text-center mt-2"
            style="color: #ff6b6b; font-weight: bold; font-size: 18px"
          >
            Bidan Assist
          </p>
        </div>
        <div class="d-flex flex-column align-items-center mt-3">
          <h1
            class="text-center mb-3"
            style="font-weight: bold; font-size: 24px"
          >
            Sign Up
          </h1>
          <form action="bidan/index.php" method="post" style="width: 300px">
            <div class="mb-3">
              <input
                type="text"
                name="nama"
                class="form-control"
                placeholder="Nama Depan"
                required
              />
            </div>
            <div class="mb-3">
              <input
                type="text"
                name="namaLengkap"
                class="form-control"
                placeholder="Nama Lengkap"
              />
            </div>
            <div class="mb-3">
              <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Email"
                required
              />
            </div>
            <div class="mb-3">
              <input
                type="number"
                name="noTelp"
                class="form-control"
                placeholder="No. Telp"
                required
              />
            </div>
            <div class="mb-3">
              <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Password"
                required
              />
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Pilih Role</label>
              <select id="role" class="form-select" required>
                <option value="" disabled selected>Pilih Role Anda</option>
                <option value="bidan">Bidan</option>
                <option value="pasien">Pasien</option>
              </select>
            </div>
            <button
              type="submit"
              class="btn"
              style="
                background-color: #ff6b6b;
                color: white;
                width: 100%;
                font-weight: bold;
              "
            >
              Login
            </button>
          </form>
          <p class="mt-3">
            Sudah Punya Akun?
            <a
              href="role_selection.html"
              style="color: #ff6b6b; font-weight: bold"
              >Log in Disini!</a
            >
          </p>
        </div>
      </div>
    </div>
  </body>
</html>

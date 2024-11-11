<?php
  session_start();

  if (!isset($_SESSION["login"])) {
    header("location: index.php");
    die;
  }

  require_once 'utility/function.php';

  // if (isset($_POST["changePasswordSubmit"])) {
  //   changePassword($_POST["oldPassword"], $_POST["newPassword"], $_POST["retypePassword"]);
  // }

  $nomorSurat = getMailNumber();

  $identifier = "setting";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/setting.css">
    <link rel="stylesheet" href="src/styles/admin/sweet-alert.css">
    <script src="src/scripts/sweetalert2.all.min.js"></script>
  </head>
  <body>

    <?php 
      if (isset($_POST["mailNumberSubmit"])) {
        setMailNumber($_POST);
      }

      if (isset($_SESSION['mailNumberAlert']) && $_SESSION['mailNumberAlert'] == 'success') {
        echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil menyimpan nomor surat',
                  showConfirmButton: false,
                  timer: 1500
                }).then(() => {
                  // After the alert closes, call a PHP script to unset the session variable
                  window.location.href='utility/unset-alert.php';
                });
              </script>";
      }
    ?>
    <div class="desktop-heading">
      <div class="logo-container">
        <img class="logo" src="src/images/icon/sidoarjo-regency-logo.svg" alt="Logo Kabupaten Sidoarjo">
        <p>
          KECAMATAN PORONG
          <br>
          KABUPATEN SIDOARJO
        </p>
      </div class="logo-container">
      <h1>Data Pengajuan Dispensasi Nikah</h1>
      <img src="src/images/icon/user.svg" alt="user icon">
    </div>

    <div class="desktop-content">
      <nav>
        <img src="src/images/icon/hamburger-menu.svg" alt="hamburger menu icon" class="hamburger-menu">
        <img src="src/images/icon/user.svg" alt="user icon">
      </nav>
  
      <div class="user-dropdown">
        <ul>
          <li>
            <a href="logout.php">
              <img src="src/images/icon/logout-icon.svg" alt="logout-icon">
              Logout
            </a>
          </li>
        </ul>
      </div>
      <div class="dark-bg"></div>
  
      <div class="off-screen-menu">
        <img src="src/images/icon/hamburger-menu-close.svg" alt="hamburger menu close icon" class="hamburger-menu-close">
        <ul>
          <li>
            <a href="dashboard.php" class="<?php if ($identifier == 'dashboard') echo 'active' ?>">
              <img src="src/images/icon/book.svg" alt="book-icon">
              Daftar Data
            </a>
          </li>
          <li>
            <a href="form-data.php" class="<?php if ($identifier == 'form-data') echo 'active' ?>">
              <img src="src/images/icon/add-data.svg" alt="add-data-icon">
              Input Data
            </a>
          </li>
          <li>
            <a href="setting.php" class="<?php if ($identifier == 'setting') echo 'active' ?>">
              <img src="src/images/icon/setting-icon.svg" alt="setting-icon">
              Pengaturan
            </a>
          </li>
        </ul>
      </div>
  
      <main>
        <h1>Pengaturan</h1>
  
        <div class="content">
          <form action="" method="post">
            <label for="mailNumber">Nomor Surat:</label>
            <input type="text" name="mailNumber" id="mailNumber" maxlength="50" value="<?= $nomorSurat ?>">
            <input type="submit" name="mailNumberSubmit" value="Simpan">
          </form>

          <!-- <hr>

          <form action="" method="post">
            <label for="changePassword">Ubah password:</label>

            <label for="oldPassword">Masukkan password lama:</label>
            <div class="input-password-container">
              <input type="password" id="oldPassword" name="oldPassword">
              <img src="src/images/icon/eye-close.svg" alt="eye icon">
            </div>

            <label for="newPassword">Masukkan password baru:</label>
            <div class="input-password-container">
              <input type="password" id="newPassword" name="newPassword">
              <img src="src/images/icon/eye-close.svg" alt="eye icon">
            </div>

            <label for="retypePassword">Masukkan ulang password baru:</label>
            <div class="input-password-container">
              <input type="password" id="retypePassword" name="retypePassword">
              <img src="src/images/icon/eye-close.svg" alt="eye icon">
            </div>

            <div class="warning">
              <p></p>
            </div>

            <input type="submit" name="changePasswordSubmit" value="Simpan">
          </form> -->
        </div>
      </main>
    </div>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
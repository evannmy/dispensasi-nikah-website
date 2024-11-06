<?php
  require_once 'utility/function.php';

  if (isset($_POST["mailNumberSubmit"])) {
    setMailNumber($_POST);
  }

  $nomorSurat = getMailNumber();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/setting.css">
  </head>
  <body>

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
            <a href="index.php">
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
            <a href="dashboard.php">
              <img src="src/images/icon/book.svg" alt="book-icon">
              Daftar Data
            </a>
          </li>
          <li>
            <a href="form-data.php">
              <img src="src/images/icon/add-data.svg" alt="add-data-icon">
              Input Data
            </a>
          </li>
          <li>
            <a href="setting.php">
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
            <input type="text" name="mailNumber" value="<?= $nomorSurat ?>">
            <input type="submit" name="mailNumberSubmit" value="Simpan">
          </form>
        </div>
      </main>
    </div>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
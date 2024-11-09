<?php
  session_start();

  if (!isset($_SESSION["login"])) {
    header("location: index.php");
    die;
  }

  if (!isset($_GET["id"])) {
    header("location: dashboard.php");
    die;
  }

  require_once 'utility/function.php';

  $data = getSpecificData($_GET);
  $dataSuami = $data['data_suami'];
  $dataIstri = $data['data_istri'];
  $dataWaktuPernikahan = $data['data_waktu_pernikahan'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/view.css">
    <link rel="stylesheet" href="src/styles/admin/sweet-alert.css">
    <script src="src/scripts/sweetalert2.all.min.js"></script>
    <script src="src/scripts/delete.js"></script>
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
        <div class="data-page">
          <div class="action">
            <div class="action-group">
              <a href="update.php?id=<?= $dataSuami['id'] ?>">Update</a>
              |
              <a onclick="confirmationDelete(event)" href="delete.php?id=<?= $dataSuami['id'] ?>">Delete</a>
            </div>
          </div>

          <div class="data-table">
            <div class="table-container">
              <div class="table-1">
                <p>Data <span style="color: #4E88C4">Suami</span></p>
      
                <table>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $dataSuami['nama'] ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><?= $dataSuami['tempat_lahir'] ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= indonesianDate($dataSuami['tanggal_lahir']) ?></td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $dataSuami['agama'] ?></td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $dataSuami['pekerjaan'] ?></td>
                  </tr>
                  <tr>
                    <td>Status Nikah</td>
                    <td>:</td>
                    <td><?= $dataSuami['status_nikah'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $dataSuami['alamat'] ?></td>
                  </tr>
                </table>
              </div>
    
              <hr>
    
              <div class="table-2">
                <p>Data <span style="color: #FF99BE">Istri</span></p>
      
                <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $dataIstri['nama'] ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><?= $dataIstri['tempat_lahir'] ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= indonesianDate($dataIstri['tanggal_lahir']) ?></td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $dataIstri['agama'] ?></td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $dataIstri['pekerjaan'] ?></td>
                  </tr>
                  <tr>
                    <td>Status Nikah</td>
                    <td>:</td>
                    <td><?= $dataIstri['status_nikah'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $dataIstri['alamat'] ?></td>
                  </tr>
                </table>
              </div>

              <hr>
  
              <div class="table-3">
                <p>Waktu <span style="color: #e7c27d">Pernikahan</span></p>
      
                <table>
                <tr>
                    <td>Hari</td>
                    <td>:</td>
                    <td><?= $dataWaktuPernikahan['hari'] ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= $dataWaktuPernikahan['tanggal'] ?></td>
                  </tr>
                  <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td><?= formatTime($dataWaktuPernikahan['jam']) ?> WIB</td>
                  </tr>
                  <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td><?= $dataWaktuPernikahan['tempat'] ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
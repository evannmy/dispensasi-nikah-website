<?php
  require_once 'utility/function.php';

  $data = getSumData();
  $i = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/dashboard.css">
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
            <a href="">
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
        <h1>
          Data Pengajuan
          <br>
          Dispensasi Nikah
        </h1>
  
        <div class="data-page">
          <table>
            <tr>
              <th>Nama</th>
              <th>Tanggal Pengajuan</th>
              <th>Aksi</th>
            </tr>
            <?php 
              $result = "";
              if (count($data['tanggalPengajuan']) == 0) {
                $result .= "<td colspan='3' style='padding-top: 2em; font-weight: bold'>Belum ada data</td>";
              } else {
                foreach ($data['tanggalPengajuan'] as $tanggal) {
                  $id = $data['namaSuami'][$i]['id'];
                  $namaSuami = $data['namaSuami'][$i]['nama'];
                  $tanggalPengajuan = $tanggal['tanggal_pengajuan'];
                  $hanyaTanggal = date("d M Y", strtotime($tanggalPengajuan));

                  $result .= "<tr>";
                  $result .= "<td>" . "<a href='view.php?id=$id'>" . $namaSuami . "</td>";
                  $result .= "<td>" . $hanyaTanggal . "</td>";
                  $result .= "<td> <a href='print.php?id=$id'> <img src='src/images/icon/print.svg' alt='print-icon'> </a> </td>";
                  $result .= "</tr>";
  
                  $i++;
                }
              }
              echo $result;

            ?>
          </table>
        </div>
    </div>
    </main>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
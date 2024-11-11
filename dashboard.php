<?php
  session_start();

  if (!isset($_SESSION["login"])) {
    header("location: index.php");
    die;
  }

  require_once 'utility/function.php';

  if (isset($_GET["search"]) && $_GET["search"] == "") {
    header("location: dashboard.php");
  } else if (isset($_GET["search"])) {
    $data = getSumData($_GET["search"]);
  } else {
    $data = getSumData();
  }
  $i = 0;

  $identifier = "dashboard";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/dashboard.css">
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
        <h1>
          Data Pengajuan
          <br>
          Dispensasi Nikah
        </h1>
  
        <div class="data-page">
          <form action="" method="get">
            <input type="text" name="search" placeholder="Masukkan nama yang ingin dicari" value="<?= isset($_GET['search'])? $_GET['search'] : '' ?>">
            <input type="submit" value="Cari">
          </form>

          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $result = "";
                if (count($data['tanggalPengajuan']) == 0 && isset($_GET['search'])) {
                  $search = $_GET['search'];
                  $result .= "<tr> <td colspan='3' style='padding-top: 2em;'>Data dengan nama <span style='font-weight: bold'>\"$search\"</span> tidak ditemukan</td> </tr>";
                } else if (count($data['tanggalPengajuan']) == 0) {
                  $result .= "<tr> <td colspan='3' style='padding-top: 2em; font-weight: bold'>Belum ada data</td> </tr>";
                } else {
                  foreach ($data['tanggalPengajuan'] as $tanggal) {
                    $id = $data['namaSuami'][$i]['id'];
                    $namaSuami = $data['namaSuami'][$i]['nama'];
                    $tanggalPengajuan = $tanggal['tanggal_pengajuan'];
                    $hanyaTanggal = date("d M Y", strtotime($tanggalPengajuan));
  
                    $result .= "<tr>";
                    $result .= "<td>" . "<a href='view.php?id=$id'>" . $namaSuami . "</td>";
                    $result .= "<td>" . $hanyaTanggal . "</td>";
                    $result .= "<td class='action'>
                                  <a href='print.php?id=$id'> <img src='src/images/icon/print.svg' alt='print-icon'> </a>
                                  <a href='delete.php?id=$id' onclick='confirmationDelete(event)'> <img src='src/images/icon/trash-icon.svg' alt='delete-icon'> </a>
                                </td>";
                    $result .= "</tr>";
    
                    $i++;
                  }
                }
                echo $result;
  
              ?>
            </tbody>
            </table>
          </div>
        </div>
    </div>
    </main>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
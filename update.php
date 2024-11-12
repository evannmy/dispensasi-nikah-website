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
    <title>Update Data</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/update.css">
    <link rel="stylesheet" href="src/styles/admin/sweet-alert.css">
    <script src="src/scripts/sweetalert2.all.min.js"></script>
  </head>
  <body>
    <?php 
      if (isset($_POST['submit'])) {
        updateData($_POST);
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
      <p class="header">Update Data</p>
      <section>
        <!-- <p>Update Data</p> -->
        <div class="form-section">
          <form action="" method="post">
            <div class="input-container">
              <div class="input-1">
                <p>Data Calon <span style="color: #4E88C4">Suami</span></p>
    
                <!-- input name -->
                <label for="hName">Nama Lengkap: </label>
                <input type="text" name="hName" id="hName" placeholder="Masukkan nama" maxlength="100" value="<?= $dataSuami['nama'] ?>" required>
        
                <!-- input place of birth -->
                <label for="hPlaceOfBirth">Tempat Lahir: </label>
                <input type="text" name="hPlaceOfBirth" id="hPlaceOfBirth" placeholder="Masukkan tempat lahir" maxlength="100" value="<?= $dataSuami['tempat_lahir'] ?>" required>
        
                <!-- input date of birth-->
                <label for="hDateOfBirth">Tanggal Lahir: </label>
                <input type="date" name="hDateOfBirth" id="hDateOfBirth" max="9999-12-31" value="<?= $dataSuami['tanggal_lahir'] ?>" required>
        
                <!-- select religion -->
                <label for="hReligion">Agama: </label>
                <select name="hReligion" id="hReligion">
                  <option value="islam" <?= $dataSuami['agama'] == 'islam' ? 'selected' : '' ?> >Islam</option>
                  <option value="kristen" <?= $dataSuami['agama'] == 'kristen' ? 'selected' : '' ?> >Kristen</option>
                  <option value="hindu" <?= $dataSuami['agama'] == 'hindu' ? 'selected' : '' ?> >Hindu</option>
                  <option value="buddha" <?= $dataSuami['agama'] == 'buddha' ? 'selected' : '' ?> >Buddha</option>
                  <option value="konghucu" <?= $dataSuami['agama'] == 'konghucu' ? 'selected' : '' ?> >Konghucu</option>
                  <option value="Kepercayaan Terhadap Tuhan YME" <?= $dataSuami['agama'] == 'Kepercayaan Terhadap Tuhan YME' ? 'selected' : '' ?>>Kepercayaan Terhadap Tuhan YME</option>
                </select>
        
                <!-- input job -->
                <label for="hJob">Pekerjaan: </label>
                <input type="text" name="hJob" id="hJob" placeholder="Masukkan pekerjaan calon suami" maxlength="50" value="<?= $dataSuami['pekerjaan'] ?>" required>

                <label for="hMarriedStatus">Status Kawin: </label>
                <select name="hMarriedStatus" id="hMarriedStatus">
                  <option value="Belum Kawin" <?= $dataSuami['status_kawin'] == 'Belum Kawin' ? 'selected' : '' ?> >Belum Kawin</option>
                  <option value="Kawin" <?= $dataSuami['status_kawin'] == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                  <option value="Cerai Hidup" <?= $dataSuami['status_kawin'] == 'Cerai Hidup' ? 'selected' : '' ?> >Cerai Hidup</option>
                  <option value="Cerai Mati" <?= $dataSuami['status_kawin'] == 'Cerai Mati' ? 'selected' : '' ?> >Cerai Mati</option>
                </select>
        
                <!-- input address -->
                <label for="hAddress">Alamat: </label>
                <textarea name="hAddress" id="hAddress" rows="3" cols="40" maxlength="100" maxlength="100" required><?= $dataSuami['alamat'] ?></textarea>
              </div>
  
              <hr>
  
              <div class="input-2">
                <p>Data Calon <span style="color: #FF99BE">Istri</span></p>
                <!-- input name -->
                <label for="wName">Nama Lengkap: </label>
                <input type="text" name="wName" id="wName" placeholder="Masukkan nama" maxlength="100" value="<?= $dataIstri['nama'] ?>" required>
        
                <!-- input place of birth -->
                <label for="wPlaceOfBirth">Tempat Lahir: </label>
                <input type="text" name="wPlaceOfBirth" id="wPlaceOfBirth" placeholder="Masukkan tempat lahir" maxlength="100" value="<?= $dataIstri['tempat_lahir'] ?>" required>
        
                <!-- input date of birth-->
                <label for="wDateOfBirth">Tanggal Lahir: </label>
                <input type="date" name="wDateOfBirth" id="wDateOfBirth" max="9999-12-31" value="<?= $dataIstri['tanggal_lahir'] ?>" required>
        
                <!-- select religion -->
                <label for="wReligion">Agama: </label>
                <select name="wReligion" id="wReligion">
                <option value="islam" <?= $dataIstri['agama'] == 'islam' ? 'selected' : '' ?> >Islam</option>
                  <option value="kristen" <?= $dataIstri['agama'] == 'kristen' ? 'selected' : '' ?> >Kristen</option>
                  <option value="hindu" <?= $dataIstri['agama'] == 'hindu' ? 'selected' : '' ?> >Hindu</option>
                  <option value="buddha" <?= $dataIstri['agama'] == 'buddha' ? 'selected' : '' ?> >Buddha</option>
                  <option value="konghucu" <?= $dataIstri['agama'] == 'konghucu' ? 'selected' : '' ?> >Konghucu</option>
                  <option value="kepercayaan Terhadap Tuhan YME" <?= $dataIstri['agama'] == 'kepercayaan Terhadap Tuhan YME' ? 'selected' : '' ?>>Kepercayaan Terhadap Tuhan YME</option>
                </select>
        
                <!-- input job -->
                <label for="wJob">Pekerjaan: </label>
                <input type="text" name="wJob" id="wJob" placeholder="Masukkan pekerjaan calon istri" maxlength="50" value="<?= $dataIstri['pekerjaan'] ?>" required>

                <label for="wMarriedStatus">Status Kawin: </label>
                <select name="wMarriedStatus" id="wMarriedStatus">
                  <option value="Belum Kawin" <?= $dataIstri['status_kawin'] == 'Belum Kawin' ? 'selected' : '' ?> >Belum Kawin</option>
                  <option value="Kawin" <?= $dataIstri['status_kawin'] == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                  <option value="Cerai Hidup" <?= $dataIstri['status_kawin'] == 'Cerai Hidup' ? 'selected' : '' ?> >Cerai Hidup</option>
                  <option value="Cerai Mati" <?= $dataIstri['status_kawin'] == 'Cerai Mati' ? 'selected' : '' ?> >Cerai Mati</option>
                </select>
        
                <!-- input address -->
                <label for="wAddress">Alamat: </label>
                <textarea name="wAddress" id="wAddress" rows="3" cols="40" maxlength="100" required><?= $dataIstri['alamat'] ?></textarea>
              </div>

              <hr>

              <div class="input-3">
                <p>Waktu <span style="color: #e7c27d">Pernikahan</span></p>

                <!-- input day of marriage -->
                <label for="dayOfMarriage">Hari: </label>
                <select name="dayOfMarriage" id="dayOfMarriage">
                  <option value="Senin" <?= $dataWaktuPernikahan['hari'] == 'Senin' ? 'selected' : '' ?> >Senin</option>
                  <option value="Selasa" <?= $dataWaktuPernikahan['hari'] == 'Selasa' ? 'selected' : '' ?> >Selasa</option>
                  <option value="Rabu" <?= $dataWaktuPernikahan['hari'] == 'Rabu' ? 'selected' : '' ?> >Rabu</option>
                  <option value="Kamis" <?= $dataWaktuPernikahan['hari'] == 'Kamis' ? 'selected' : '' ?> >Kamis</option>
                  <option value="Jum''at" <?= $dataWaktuPernikahan['hari'] == "Jum'at" ? 'selected' : '' ?> >Jum'at</option>
                  <option value="Sabtu" <?= $dataWaktuPernikahan['hari'] == 'Sabtu' ? 'selected' : '' ?> >Sabtu</option>
                  <option value="Minggu" <?= $dataWaktuPernikahan['hari'] == 'Minggu' ? 'selected' : '' ?> >Minggu</option>
                </select>
        
                <!-- input date of marriage-->
                <label for="dateOfMarriage">Tanggal: </label>
                <input type="date" name="dateOfMarriage" id="dateOfMarriage" max="9999-12-31" value="<?= $dataWaktuPernikahan['tanggal'] ?>" required>

                <!-- input time of marriage-->
                <label for="timeOfMarriage">Jam: </label>
                <input type="time" name="timeOfMarriage" id="timeOfMarriage" value="<?= timeWithoutSecond($dataWaktuPernikahan['jam']) ?>" required>
        
                <!-- select place of marriage -->
                <label for="placeOfMarriage">Tempat: </label>
                <input type="text" name="placeOfMarriage" id="placeOfMarriage" placeholder="Masukkan tempat pernikahan" maxlength="50" value="<?= $dataWaktuPernikahan['tempat'] ?>" required>
              </div>
            </div>

            <input type="submit" name="submit" value="update">
            </form>
        </div>

        <div class="icon-section"></div>
      </section>
    </main>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
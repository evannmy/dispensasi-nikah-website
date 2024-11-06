<?php 
  require_once 'utility/function.php';

  if (isset($_POST['submit'])) {
    insertData($_POST);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/form-data.css">
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
            <a href="">
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
      <p class="header">Form Permohonan Surat <br>Dispensasi Nikah</p>
      <section>
        <div class="form-section">
          <form action="" method="post">
            <div class="input-container">
              <div class="input-1">
                <p>Data Calon <span style="color: #4E88C4">Suami</span></p>
    
                <!-- input name -->
                <label for="hName">Nama Lengkap: </label>
                <input type="text" name="hName" id="hName" placeholder="Masukkan nama calon suami" required>
        
                <!-- input place of birth -->
                <label for="hPlaceOfBirth">Tempat Lahir: </label>
                <input type="text" name="hPlaceOfBirth" id="hPlaceOfBirth" placeholder="Masukkan tempat lahir calon suami" required>
        
                <!-- input date of birth-->
                <label for="hDateOfBirth">Tanggal Lahir: </label>
                <input type="date" name="hDateOfBirth" id="hDateOfBirth" required>
        
                <!-- select religion -->
                <label for="hReligion">Agama: </label>
                <select name="hReligion" id="hReligion">
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
        
                <!-- input job -->
                <label for="hJob">Pekerjaan: </label>
                <input type="text" name="hJob" id="hJob" placeholder="Masukkan pekerjaan calon suami" required>
        
                <!-- married status -->
                <label for="hMarriedStatus">Status Nikah: </label>
                <input type="text" name="hMarriedStatus" id="hMarriedStatus" placeholder="Masukkan status nikah saat ini" required>
        
                <!-- input address -->
                <label for="hAddress">Alamat: </label>
                <textarea name="hAddress" id="hAddress" rows="3" cols="40" maxlength="100" required></textarea>
              </div>
  
              <hr>
  
              <div class="input-2">
                <p>Data Calon <span style="color: #FF99BE">Istri</span></p>
                <!-- input name -->
                <label for="wName">Nama Lengkap: </label>
                <input type="text" name="wName" id="wName" placeholder="Masukkan nama calon istri" required>
        
                <!-- input place of birth -->
                <label for="wPlaceOfBirth">Tempat Lahir: </label>
                <input type="text" name="wPlaceOfBirth" id="wPlaceOfBirth" placeholder="Masukkan tempat lahir calon istri" required>
        
                <!-- input date of birth-->
                <label for="wDateOfBirth">Tanggal Lahir: </label>
                <input type="date" name="wDateOfBirth" id="wDateOfBirth" required>
        
                <!-- select religion -->
                <label for="wReligion">Agama: </label>
                <select name="wReligion" id="wReligion">
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
        
                <!-- input job -->
                <label for="wJob">Pekerjaan: </label>
                <input type="text" name="wJob" id="wJob" placeholder="Masukkan pekerjaan calon istri" required>
        
                <!-- married status -->
                <label for="wMarriedStatus">Status Nikah: </label>
                <input type="text" name="wMarriedStatus" id="wMarriedStatus" placeholder="Masukkan status nikah saat ini" required>
        
                <!-- input address -->
                <label for="wAddress">Alamat: </label>
                <textarea name="wAddress" id="wAddress" rows="3" cols="40" maxlength="100" required></textarea>
              </div>

              <hr>
  
              <div class="input-3">
                <p>Waktu <span style="color: #e7c27d">Pernikahan</span></p>
                <!-- input day of marriage -->
                <label for="dayOfMarriage">Hari: </label>
                <input type="text" name="dayOfMarriage" id="dayOfMarriage" placeholder="Masukkan hari" required>
        
                <!-- input date of marriage-->
                <label for="dateOfMarriage">Tanggal: </label>
                <input type="date" name="dateOfMarriage" id="dateOfMarriage" required>

                <!-- input time of marriage-->
                <label for="timeOfMarriage">Jam: </label>
                <input type="time" name="timeOfMarriage" id="timeOfMarriage" required>
        
                <!-- select place of marriage -->
                <label for="placeOfMarriage">Tempat: </label>
                <input type="text" name="placeOfMarriage" id="placeOfMarriage" placeholder="Masukkan tempat pernikahan" required>
              </div>
            </div>

            <input type="submit" name="submit" value="simpan">
            </form>
        </div>

        <div class="icon-section"></div>
      </section>
    </main>

  <script src="src/scripts/admin.js"></script>
  </body>
</html>
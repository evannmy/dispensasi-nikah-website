<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensasi Nikah - Data Suami</title>
    <link rel="stylesheet" href="styles/form-data.css">
  </head>
  <body>

    <main>
      <nav>
        <img class="logo" src="images/sidoarjo-regency-logo.svg" alt="Logo Kabupaten Sidoarjo">
        <p>
          KECAMATAN PORONG
          <br>
          KABUPATEN SIDOARJO
        </p>
      </nav>
    
      <p class="header">Permohonan Surat Dispensasi Nikah</p>
      <p>Masukkan Data Calon Suami</p>

      <form action="data-istri.php" method="post">
        <!-- input name -->
        <label for="name">Nama Lengkap: </label>
        <input type="text" name="name" id="name" placeholder="Masukkan nama" required>

        <!-- input place of birth -->
        <label for="placeOfBirth">Tempat Lahir: </label>
        <input type="text" name="placeOfBirth" id="placeOfBirth" placeholder="Masukkan lahir" required>

        <!-- input date of birth-->
        <label for="dateOfBirth">Tanggal Lahir: </label>
        <input type="date" name="dateOfBirth" id="dateOfBirth" required>

        <!-- select religion -->
        <label for="religion">Agama: </label>
        <select name="religion" id="religion">
          <option value="islam">Islam</option>
          <option value="kristen">Kristen</option>
          <option value="hindu">Hindu</option>
          <option value="buddha">Buddha</option>
          <option value="konghucu">Konghucu</option>
        </select>

        <!-- input job -->
        <label for="job">Pekerjaan: </label>
        <input type="text" name="job" id="job" placeholder="Masukkan pekerjaan calon suami" required>

        <!-- married status -->
        <label for="marriedStatus">Status Nikah: </label>
        <input type="text" name="marriedStatus" id="marriedStatus" placeholder="Masukkan status nikah saat ini" required>

        <!-- input address -->
        <label for="address">Alamat: </label>
        <textarea name="address" id="address" rows="3" cols="40" required></textarea>

        <input type="submit" name="submit" value="simpan">
      </form>
    </main>

  </body>
</html>
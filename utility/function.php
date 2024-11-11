<?php
  $servername = 'localhost';
  $username = 'root';
  $password = 'evan_db123';
  $dbname = 'dispensasi_nikah';

  // create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // check connection
  if ( !$conn ) {
    die('Connection failed: '. mysqli_connect_error());
  }

  function getSumData($search = "") {
    global $conn;

    $hNameRows = [];
    $dateRows = [];

    if (empty($search)) {
      $sql = "SELECT id, nama FROM data_suami ORDER BY id DESC";
      $sql2 = "SELECT tanggal_pengajuan FROM data_pemohon ORDER BY id DESC";

      $retVal2 = mysqli_query($conn, $sql2);
      while ($row = mysqli_fetch_assoc($retVal2)) {
        $dateRows[] = $row;
      }
    } else {
      $sql = "SELECT id, nama FROM data_suami WHERE nama LIKE '%$search%' ORDER BY id DESC";

      $dateIdArray = [];
      $retDateId = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($retDateId)) {
        $dateIdArray[] = $row['id'];
      }

      foreach($dateIdArray as $id) {
        $sqlDate = "SELECT tanggal_pengajuan FROM data_pemohon WHERE id_suami=$id";
        $date = mysqli_fetch_assoc(mysqli_query($conn, $sqlDate));
        $dateRows[] = $date;
      }
    }

    $retVal1 = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($retVal1)) {
      $hNameRows[] = $row;
    }

    $sumData = [
      "namaSuami" => $hNameRows,
      "tanggalPengajuan" => $dateRows
    ];

    return $sumData;
  }

  function insertData($postVar) {
    global $conn;

    $namaSuami = htmlspecialchars($postVar['hName']);
    $tempatLahirSuami = htmlspecialchars($postVar['hPlaceOfBirth']);
    $tanggalLahirSuami = htmlspecialchars($postVar['hDateOfBirth']);
    $agamaSuami = htmlspecialchars($postVar['hReligion']);
    $pekerjaanSuami = htmlspecialchars($postVar['hJob']);
    $statusNikahSuami = htmlspecialchars($postVar['hMarriedStatus']);
    $alamatSuami = htmlspecialchars($postVar['hAddress']);

    $namaIstri = htmlspecialchars($postVar['wName']);
    $tempatLahirIstri = htmlspecialchars($postVar['wPlaceOfBirth']);
    $tanggalLahirIstri = htmlspecialchars($postVar['wDateOfBirth']);
    $agamaIstri = htmlspecialchars($postVar['wReligion']);
    $pekerjaanIstri = htmlspecialchars($postVar['wJob']);
    $statusNikahIstri = htmlspecialchars($postVar['wMarriedStatus']);
    $alamatIstri = htmlspecialchars($postVar['wAddress']);

    $hariPernikahan = htmlspecialchars($postVar['dayOfMarriage']);
    $tanggalPernikahan = htmlspecialchars($postVar['dateOfMarriage']);
    $tempatPernikahan = htmlspecialchars($postVar['placeOfMarriage']);
    $jamPernikahan = htmlspecialchars($postVar['timeOfMarriage']);

    $sql = "INSERT INTO data_suami VALUES (default, '$namaSuami', '$tempatLahirSuami', '$tanggalLahirSuami', '$agamaSuami', '$pekerjaanSuami', '$statusNikahSuami', '$alamatSuami')";
    $sql2 = "INSERT INTO data_istri VALUES (default, '$namaIstri', '$tempatLahirIstri', '$tanggalLahirIstri', '$agamaIstri', '$pekerjaanIstri', '$statusNikahIstri', '$alamatIstri')";
    $sql3 = "INSERT INTO waktu_pernikahan VALUES (default, '$hariPernikahan', '$tanggalPernikahan', '$jamPernikahan', '$tempatPernikahan')";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
      echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Data berhasil ditambahkan',
          showConfirmButton: false,
          timer: 1500
        });
      </script>";
    } else {
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Data gagal ditambahkan',
          showConfirmButton: false,
          timer: 1500
        });
      </script>";
    }

    $sqlIdSuami = "SELECT id FROM data_suami ORDER BY id DESC LIMIT 1";
    $idSuami = mysqli_fetch_assoc(mysqli_query($conn, $sqlIdSuami))['id'];

    $sqlIdIstri = "SELECT id FROM data_istri ORDER BY id DESC LIMIT 1";
    $idIstri = mysqli_fetch_assoc(mysqli_query($conn, $sqlIdIstri))['id'];

    $sqlIdWaktuPernikahan = "SELECT id FROM waktu_pernikahan ORDER BY id DESC LIMIT 1";
    $idWaktuPernikahan = mysqli_fetch_assoc(mysqli_query($conn, $sqlIdWaktuPernikahan))['id'];

    $sql4 = "INSERT INTO data_pemohon VALUES (default, $idSuami, $idIstri, $idWaktuPernikahan, default)";
    mysqli_query($conn, $sql4);
  }

  function getSpecificData($getVar) {
    global $conn;

    $idDataPemohon = $getVar['id'];
    
    $sql1 = "SELECT id_suami, id_istri, id_waktu_pernikahan FROM data_pemohon WHERE id_suami=$idDataPemohon";
    $result1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));

    $idSuami = $result1['id_suami'];
    $idIstri = $result1['id_istri'];
    $idWaktuPernikahan = $result1['id_waktu_pernikahan'];

    $sql2 = "SELECT * FROM data_suami WHERE id=$idSuami";
    $result2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

    $sql3 = "SELECT * FROM data_istri WHERE id=$idIstri";
    $result3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));

    $sql4 = "SELECT * FROM waktu_pernikahan WHERE id=$idWaktuPernikahan";
    $result4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));

    $data = [
      "data_suami" => $result2,
      "data_istri" => $result3,
      "data_waktu_pernikahan" => $result4
    ];

    return $data;
  }

  function updateData($postVar) {
    global $conn;

    $idSuami = $_GET['id'];
    $namaSuami = htmlspecialchars($postVar['hName']);
    $tempatLahirSuami = htmlspecialchars($postVar['hPlaceOfBirth']);
    $tanggalLahirSuami = htmlspecialchars($postVar['hDateOfBirth']);
    $agamaSuami = htmlspecialchars($postVar['hReligion']);
    $pekerjaanSuami = htmlspecialchars($postVar['hJob']);
    $statusNikahSuami = htmlspecialchars($postVar['hMarriedStatus']);
    $alamatSuami = htmlspecialchars($postVar['hAddress']);

    $sqlGetIdIstri = "SELECT id_istri FROM data_pemohon WHERE id_suami=$idSuami";
    
    $idIstri = mysqli_fetch_assoc(mysqli_query($conn, $sqlGetIdIstri))['id_istri'];
    $namaIstri = htmlspecialchars($postVar['wName']);
    $tempatLahirIstri = htmlspecialchars($postVar['wPlaceOfBirth']);
    $tanggalLahirIstri = htmlspecialchars($postVar['wDateOfBirth']);
    $agamaIstri = htmlspecialchars($postVar['wReligion']);
    $pekerjaanIstri = htmlspecialchars($postVar['wJob']);
    $statusNikahIstri = htmlspecialchars($postVar['wMarriedStatus']);
    $alamatIstri = htmlspecialchars($postVar['wAddress']);

    $sqlGetIdWaktuPernikahan = "SELECT id_waktu_pernikahan FROM data_pemohon WHERE id_suami=$idSuami";

    $idWaktuPernikahan = mysqli_fetch_assoc(mysqli_query($conn, $sqlGetIdWaktuPernikahan))['id_waktu_pernikahan'];
    $hariPernikahan = htmlspecialchars($postVar['dayOfMarriage']);
    $tanggalPernikahan = htmlspecialchars($postVar['dateOfMarriage']);
    $jamPernikahan = htmlspecialchars($postVar['timeOfMarriage']);
    $tempatPernikahan = htmlspecialchars($postVar['placeOfMarriage']);

    $sql = "UPDATE data_suami SET nama='$namaSuami', tempat_lahir='$tempatLahirSuami', tanggal_lahir='$tanggalLahirSuami', agama='$agamaSuami', pekerjaan='$pekerjaanSuami', status_nikah='$statusNikahSuami', alamat='$alamatSuami' WHERE id=$idSuami";
    $sql2 = "UPDATE data_istri SET nama='$namaIstri', tempat_lahir='$tempatLahirIstri', tanggal_lahir='$tanggalLahirIstri', agama='$agamaIstri', pekerjaan='$pekerjaanIstri', status_nikah='$statusNikahIstri', alamat='$alamatIstri' WHERE id=$idIstri";
    $sql3 = "UPDATE waktu_pernikahan SET hari='$hariPernikahan', tanggal='$tanggalPernikahan', jam='$jamPernikahan', tempat='$tempatPernikahan' WHERE id=$idWaktuPernikahan";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
      echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Data berhasil diperbarui',
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
          window.location.href='view.php?id=$idSuami';
        }, 1500);
      </script>";
    } else {
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Data gagal diperbarui',
          showConfirmButton: false,
          timer: 1500
        });
      </script>";
    }
  }

  function deleteData($idDataSuami) {
    echo $idDataSuami;
  }

  function indonesianDate($date) {
    $indonesianMonth = [
      1 => 'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember',
    ];

    $separatedDate = explode('-', $date);

    $year = $separatedDate[0];
    $month = $indonesianMonth[(int)$separatedDate[1]];
    $day = $separatedDate[2];
    
    return "$day $month $year";
  }

  function formatTime($time) {
    $timeExploded = explode(':', $time);
    $timeFormated = $timeExploded[0] . "." . $timeExploded[1];
    return $timeFormated;
  }

  function timeWithoutSecond($time) {
    $timeExploded = explode(':', $time);
    $timeFormated = $timeExploded[0] . ":" . $timeExploded[1];
    return $timeFormated;
  }

  function setMailNumber($postVar) {
    global $conn;

    $mailNumber = $postVar["mailNumber"];
    
    $checkSql = "SELECT nomor FROM nomor_surat";
    $resultCheckSql = mysqli_query($conn, $checkSql);
    $numRows = mysqli_num_rows($resultCheckSql);

    if ($numRows > 0) {
      $sql = "UPDATE nomor_surat SET nomor='$mailNumber'";
    } else {
      $sql = "INSERT INTO nomor_surat VALUES('$mailNumber')";
    }
    
    if(mysqli_query($conn, $sql)) {
      echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil menyimpan nomor surat',
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
          window.location.href='setting.php';
        }, 1500);
      </script>";
    } else {
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Gagal menyimpan nomor surat',
          showConfirmButton: false,
          timer: 1500
        });
      </script>";
    }
  }

  function getMailNumber() {
    global $conn;

    $sql = "SELECT nomor FROM nomor_surat";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
      $nomorSurat = mysqli_fetch_assoc($result)['nomor'];
      
      return $nomorSurat;
    }

    return;
  }

  function checkUser($username, $passwordInput) {
    global $conn;

    $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);

    $sqlFindUser = "SELECT * from users WHERE username='$username'";
    $resultSqlFindUser = mysqli_query($conn, $sqlFindUser);

    $numRows = mysqli_num_rows($resultSqlFindUser);

    if ($numRows < 1) {
      return;
    }

    $passwordDB = mysqli_fetch_assoc($resultSqlFindUser)['password'];

    if ($username == "admin" && $passwordDB == $passwordInput) {
      return true;
    } 
    // else if (password_verify($passwordInput, $passwordDB)) {
    //   echo "test";
    // }
  }

  function convertDocToPdf($libreOfficePath, $inputFile, $outputDir) {
    // this function require libreoffice app
    exec("$libreOfficePath --headless --convert-to pdf \"$inputFile\" --outdir \"$outputDir\"");
  }

  // function changePassword($oldPasswordInput, $newPasswordInput, $retypePasswordInput) {
  //   global $conn;
  // }
?>
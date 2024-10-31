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

  function getSumData() {
    global $conn;

    $hNameRows = [];
    $wNameRows = [];
    $dateRows = [];

    $sql = 'SELECT id, nama FROM data_suami ORDER BY id DESC';
    $sql2 = 'SELECT id, nama FROM data_istri ORDER BY id DESC';
    $sql3 = 'SELECT tanggal_pengajuan FROM data_pemohon ORDER BY id DESC';

    $retVal1 = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($retVal1)) {
      $hNameRows[] = $row;
    }

    $retVal2 = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_assoc($retVal2)) {
      $wNameRows[] = $row;
    }

    $retVal3 = mysqli_query($conn, $sql3);
    while ($row = mysqli_fetch_assoc($retVal3)) {
      $dateRows[] = $row;
    }

    $sumData = [
      "namaSuami" => $hNameRows,
      "namaIstri" => $wNameRows,
      "tanggalPengajuan" => $dateRows
    ];

    return $sumData;
  }

  function insertData($postVar) {
    global $conn;

    $namaSuami = $postVar['hName'];
    $tempatLahirSuami = $postVar['hPlaceOfBirth'];
    $tanggalLahirSuami = $postVar['hDateOfBirth'];
    $agamaSuami = $postVar['hReligion'];
    $pekerjaanSuami = $postVar['hJob'];
    $statusNikahSuami = $postVar['hMarriedStatus'];
    $alamatSuami = $postVar['hAddress'];

    $namaIstri = $postVar['wName'];
    $tempatLahirIstri = $postVar['wPlaceOfBirth'];
    $tanggalLahirIstri = $postVar['wDateOfBirth'];
    $agamaIstri = $postVar['wReligion'];
    $pekerjaanIstri = $postVar['wJob'];
    $statusNikahIstri = $postVar['wMarriedStatus'];
    $alamatIstri = $postVar['wAddress'];

    $sql = "INSERT INTO data_suami VALUES (default, '$namaSuami', '$tempatLahirSuami', '$tanggalLahirSuami', '$agamaSuami', '$pekerjaanSuami', '$statusNikahSuami', '$alamatSuami')";
    $sql2 = "INSERT INTO data_istri VALUES (default, '$namaIstri', '$tempatLahirIstri', '$tanggalLahirIstri', '$agamaIstri', '$pekerjaanIstri', '$statusNikahIstri', '$alamatIstri')";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
      echo "<script>
      alert('Data berhasil ditambahkan');
      </script>";
    } else {
      echo "<script>
      alert('Data gagal ditambahkan');
      </script>";
    }

    $sqlIdSuami = "SELECT id FROM data_suami ORDER BY id DESC LIMIT 1";
    $idSuami = mysqli_fetch_assoc(mysqli_query($conn, $sqlIdSuami))['id'];

    $sqlIdIstri = "SELECT id FROM data_istri ORDER BY id DESC LIMIT 1";
    $idIstri = mysqli_fetch_assoc(mysqli_query($conn, $sqlIdIstri))['id'];

    $sql3 = "INSERT INTO data_pemohon VALUES (default, $idSuami, $idIstri, default)";
    mysqli_query($conn, $sql3);
  }

  function getSpecificData($getVar) {
    global $conn;

    $idDataPemohon = $getVar['id'];
    
    $sql1 = "SELECT id_suami, id_istri FROM data_pemohon WHERE id_suami=$idDataPemohon";
    $result1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));

    $idSuami = $result1['id_suami'];
    $idIstri = $result1['id_istri'];

    $sql2 = "SELECT * FROM data_suami WHERE id=$idSuami";
    $result2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

    $sql3 = "SELECT * FROM data_istri WHERE id=$idIstri";
    $result3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));

    $data = [
      "data_suami" => $result2,
      "data_istri" => $result3
    ];

    return $data;
  }

  function updateData($postVar) {
    global $conn;

    $idSuami = $_GET['id'];
    $namaSuami = $postVar['hName'];
    $tempatLahirSuami = $postVar['hPlaceOfBirth'];
    $tanggalLahirSuami = $postVar['hDateOfBirth'];
    $agamaSuami = $postVar['hReligion'];
    $pekerjaanSuami = $postVar['hJob'];
    $statusNikahSuami = $postVar['hMarriedStatus'];
    $alamatSuami = $postVar['hAddress'];

    $sqlGetIdIstri = "SELECT id_istri FROM data_pemohon WHERE id_suami=$idSuami";
    
    $idIstri = mysqli_fetch_assoc(mysqli_query($conn, $sqlGetIdIstri))['id_istri'];
    $namaIstri = $postVar['wName'];
    $tempatLahirIstri = $postVar['wPlaceOfBirth'];
    $tanggalLahirIstri = $postVar['wDateOfBirth'];
    $agamaIstri = $postVar['wReligion'];
    $pekerjaanIstri = $postVar['wJob'];
    $statusNikahIstri = $postVar['wMarriedStatus'];
    $alamatIstri = $postVar['wAddress'];

    $sql = "UPDATE data_suami SET nama='$namaSuami', tempat_lahir='$tempatLahirSuami', tanggal_lahir='$tanggalLahirSuami', agama='$agamaSuami', pekerjaan='$pekerjaanSuami', status_nikah='$statusNikahSuami', alamat='$alamatSuami' WHERE id=$idSuami";
    $sql2 = "UPDATE data_istri SET nama='$namaIstri', tempat_lahir='$tempatLahirIstri', tanggal_lahir='$tanggalLahirIstri', agama='$agamaIstri', pekerjaan='$pekerjaanIstri', status_nikah='$statusNikahIstri', alamat='$alamatIstri' WHERE id=$idIstri";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
      echo "<script>
      alert('Data berhasil diperbarui');
      window.location.href='view.php?id=$idSuami';
      </script>";
    } else {
      echo "<script>
      alert('Data gagal diperbarui');
      </script>";
    }
  }
?>
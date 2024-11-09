<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Data</title>
  <link rel="stylesheet" href="src/styles/admin/sweet-alert.css">
  <script src="src/scripts/sweetalert2.all.min.js"></script>
</head>
<body>
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

    $idSuami = $_GET['id'];

    $sql = "SELECT id, id_istri, id_waktu_pernikahan FROM data_pemohon WHERE id_suami=$idSuami";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $idIstri = $result['id_istri'];
    $idDataPemohon = $result['id'];
    $idWaktuPernikahan = $result['id_waktu_pernikahan'];
    
    $sqlDelDataSuami = "DELETE FROM data_suami WHERE id=$idSuami";
    $sqlDelDataIstri = "DELETE FROM data_istri WHERE id=$idIstri";
    $sqlDelDataPemohon = "DELETE FROM data_pemohon WHERE id=$idDataPemohon";
    $sqlDelWaktuPernikahan = "DELETE FROM waktu_pernikahan WHERE id=$idWaktuPernikahan";

    if (mysqli_query($conn, $sqlDelDataPemohon) && mysqli_query($conn, $sqlDelDataSuami) && mysqli_query($conn, $sqlDelDataIstri) && mysqli_query($conn, $sqlDelWaktuPernikahan)) {
      echo "<script>
      window.location.href='dashboard.php';
      </script>";
    } else {
      echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Data gagal dihapus',
            showConfirmButton: false,
            timer: 1500
          });
        </script>";
    }
  ?>
</body>
</html>
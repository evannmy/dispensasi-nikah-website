<?php
  session_start();

  if (isset($_SESSION['mailNumberAlert'])) {
    unset($_SESSION['mailNumberAlert']);
    header("location: ../setting.php");
  } else if (isset($_SESSION['ttdAlert'])) {
    unset($_SESSION['ttdAlert']);
    header("location: ../setting.php");
  }
?>
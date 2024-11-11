<?php
  session_start();

  if (isset($_SESSION['mailNumberAlert'])) {
    unset($_SESSION['mailNumberAlert']);
    header("location: ../setting.php");
  }
?>
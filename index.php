<?php
  session_start();

  require_once 'utility/function.php';

  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (checkUser($username, $password)) {
      header("location: dashboard.php");
      $_SESSION["login"] = true;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="src/images/icon/sidoarjo-regency-logo.ico">
    <link rel="stylesheet" href="src/styles/admin/login.css">
  </head>
  <body>
    <nav>
      <img class="logo" src="src/images/icon/sidoarjo-regency-logo.svg" alt="Logo Kabupaten Sidoarjo">
      <p>
        KECAMATAN PORONG
        <br>
        KABUPATEN SIDOARJO
      </p>
    </nav>

    <main>
      <h1>Login</h1>

      <div class="form-bg">
        
      </div>
      <form method="post" action="">
        <!-- username input -->
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>

        <!-- password input -->
        <label for="password">Password: </label>
        <div class="input-password-container">
          <input type="password" name="password" id="password" required>
          <img src="src/images/icon/eye-close.svg" alt="eye icon">
        </div>

        <?php
          if (isset($_POST["submit"])) {
            if (checkUser($username, $password) != true) {
              echo "<p class='warning'>Username/Password salah</p>";
            }
          }
        ?>

         <input type="submit" name="submit" value="login">
      </form>
    </main>

  <script src="src/scripts/login-page.js"></script>
  </body>
</html>
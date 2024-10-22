<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../src/styles/dashboard.css">
  </head>
  <body>

    <nav>
      <div class="hamburger-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <img src="../src/images/user.svg" alt="user icon">
    </nav>

    <div class="user-dropdown">
      <ul>
        <li>
          <a href="">
            <img src="../src/images/logout-icon.svg" alt="logout-icon">
            Logout
          </a>
        </li>
      </ul>
    </div>
    <div class="dark-bg"></div>

    <div class="off-screen-menu">
      <ul>
        <li>
          <a href="">
            <img src="../src/images/book.svg" alt="book-icon">
            Daftar Data
          </a>
        </li>
        <li>
          <a href="../data-suami.php">
            <img src="../src/images/add-data.svg" alt="add-data-icon">
            Input Data
          </a>
        </li>
      </ul>
    </div>

    <div class="side">
      <p>Data</p>
    </div>

    <main>
      <h1>
         Data Pengajuan
        <br>
        Dispensasi Nikah
      </h1>

      <div class="data-page"></div>
    </main>

  <script src="../src/scripts/dashboard.js"></script>
  </body>
</html>
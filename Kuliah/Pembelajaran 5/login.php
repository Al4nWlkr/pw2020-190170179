<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

require 'functions.php';

// ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required Meta File -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Style CSS -->
  <style>
    .message {
      padding: 20px;
      position: fixed;
      display: flex;
      left: 50%;
      transform: translateX(-50%);
      justify-content: center;
      color: #ff0000;
      font-size: 20px;
    }
  </style>

  <!-- Link Files -->
  <link rel="stylesheet" href="css/login.css">

  <title>Login</title>
</head>

<body>
  <?php if (isset($login['error'])) : ?>
    <p class="message"><?= $login['pesan']; ?></p>
  <?php endif; ?>

  <section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <div class="box">
      <div class="square" style="--i:0"></div>
      <div class="square" style="--i:1"></div>
      <div class="square" style="--i:2"></div>
      <div class="square" style="--i:3"></div>
      <div class="square" style="--i:4"></div>
      <div class="container">
        <div class="form">
          <h2>Form Login</h2>

          <form action="" method="POST">
            <div class="inputBox">
              <input type="text" name="username" placeholder="Username" autocomplete="off" required>
            </div>

            <div class="inputBox">
              <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="inputBox">
              <input type="submit" name="login" value="Login"></input>
            </div>

            <p class="forget">
              Belum Mempunyai Akun?
              <a href="registrasi.php">Registrasi</a>
            </p>
          </form>
        </div>
      </div>
    </div>

  </section>
</body>

</html>
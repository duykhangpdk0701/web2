<?php
include_once "./header.php";
?>

<title>Đăng Nhập</title>
</head>

<body>

  <section class="login-page">
    <form class="login-form" action="./includes/login.inc.php" method="post">
      <i class="logo fas fa-dice"></i>
      <?php
if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error === "wronglogin") {
    echo "<P class='error-string'>Your account is not exist in system</P>";
  } else if ($error === "wrongpassword") {
    echo "<P class='error-string'>Wrong password</P>";
  }
}
?>
      <h6 class="login-description">Đăng nhập với tài khoản Dice Games</h6>
      <input id="username" name="username" type="text" class="login-username" placeholder="Email hoặc Tên đăng nhập"
        required>
      <input id="password" name="password" type="password" class="login-password" placeholder="Mật khẩu" required>
      <div class="login-remember-check-box-forgot-password-container">

        <p class="login-forgot-password-container"><a href="">Quên mật khẩu</a></p>
      </div>
      <button class="submit-btn" type="submit" name="submit">Đăng nhập</button>
      <div class="sign-up-option-container">
        <p class="sign-up-option-description">Không có tài khoảng Dice Games?&nbsp
          <a class="sign-up-option-link" href="./signUp.php">Đăng ký</a>
        </p>
      </div>
    </form>
  </section>


</body>

<script src="./js/handleLogin.js"></script>

</html>
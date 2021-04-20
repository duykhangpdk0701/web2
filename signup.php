<?php
include_once "./header.php";
?>

<title>Đăng ký</title>
</head>

<body>

  <section class="signup-page">
    <form action="./includes/signup.inc.php" class="signup-form" method="POST">
      <i class="logo fas fa-dice"></i>
      <h6 class="signup-description">Đăng ký tài khoản Dice Games</h6>

      <?php
if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error === "passwordNotMatch") {
    echo "<P class='error-string'>Trường mật khẩu và trường xác nhận mật khẩu không khớp với nhau</P>";
  } else if ($error === "invalidEmail") {
    echo "<P class='error-string'>Email không hợp lệ</P>";
  } else if ($error === "invalidUsername") {
    echo "<P class='error-string'>Tên đăng nhập không hợp lệ, Tên đăng nhập không bao gôm ký tự đặc biệt và khoảng trắng</P>";
  } else if ($error === 'usernameTaken') {
    echo "<P class='error-string'>Tên đăng nhập này đã được sửa dụng xin vui lòng chọn tên đăng nhập khác</P>";
  } else if ($error === "emailTaken") {
    echo "<P class='error-string'>email này đã được sửa dụng xin vui lòng email khác</P>";
  }
}
?>
      <div class='name-container'>
        <input class="signup-first-name" type="text" name='firstName' placeholder="Tên" require>
        <div class="space-name"></div>
        <input class="signup-last-name" type="text" name="lastName" placeholder="Họ" require>
      </div>
      <input class="signup-username" type="text" name='username' placeholder="Tên đăng nhập" require>
      <input class="signup-email" type="text" name="email" placeholder="Email" require>
      <input class="signup-password" type="password" name="password" placeholder="Mật khẩu" require>
      <input class="signup-password-repeat" type="password" name="passwordRepeat" placeholder="Nhập lại mật Khẩu"
        require>
      <button name="submit" class="submit-btn submit-btn-signup">Đăng Ký</button>
      <div class="sign-up-option-container">
        <p class="sign-up-option-description">Đã có tài khoảng Dice Games?&nbsp
          <a class="sign-up-option-link" href="./login.php">Đăng Nhập</a>
        </p>
      </div>
    </form>
  </section>

</body>

<script src="./js/handleSignup.js"></script>

</html>
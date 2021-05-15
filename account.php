<?php
session_start();
?>
<?php
include_once "./header.php";
?>

<link rel="stylesheet" href="./styles/account.css">
<title>Dice Game</title>
</head>

<body>
  <section class="index-section section">
    <nav class="nav-bar">
      <a href="./" class="index-href-logo">
        <i class="index-logo fas fa-dice"></i>
      </a>
      <div class="index-profile-container">
        <?php
if (isset($_SESSION["userName"])) {
  $username = $_SESSION["userName"];
  echo "<span class='index-profile-a' href='./login.php'><i class='index-logo-profile fas fa-user'></i>";
  echo "<span class='current-user'>$username</span></span>";
  echo "<ul class='index-nav-ul'>";
  echo "<li class='index-nav-li'><a href='./account.php'>Tài Khoản</a></li>";
  echo "<li class='index-nav-li'><a href='./wishlist.php'>Giỏ hàng</a></li>";
  echo "<li class='index-nav-li'><a href='./includes/handleMarketPage.inc.php'>Market</a></li>";
  if ($_SESSION["admin"] == 1) {
    echo "<li class='index-nav-li'><a href='./adminApproveList.php'>Admin</a></li>";
  }
  echo "<li class='index-nav-li'><a href='./includes/logout.inc.php'>Đăng xuất</a></li>";
  echo "</ul>";
} else {
  echo '<a class="index-profile-a" href="./login.php"><i class="fas fa-user"></i> <span> Log in</span></a>';
}
?>
      </div>
    </nav>
    <nav class="index-semi-nav-bar-container">
      <div class="index-semi-nav-bar">
        <div class="index-semi-nav-bar-left">
          <div class="browse-container">
            <a href="./index.php">Cửa hàng</a>
            <a href="./account.php" style="color: rgb(18, 18, 18)">Tài Khoản</a>
            <a href="./purchased.php">Đã mua</a>
          </div>

        </div>

      </div>
    </nav>

    <div class="account-main">
      <div class="account-container">
        <p class="account-container-title">Thông tin tài khoản</p>
        <div class="account-container-info">
          <div class="account-username-container">
            <p class="account-username-title account-title">Username:</p>
            <p class="account-username-text account-text">Lorem, ipsum.</p>
          </div>

          <div class="account-username-container">
            <p class="account-email-title account-title">Email:</p>
            <p class="account-email-text account-text">Lorem, ipsum.</p>
          </div>

          <div class="account-username-container">
            <p class="account-firstname-title account-title">Tên:</p>
            <p class="account-firstname-text account-text">Lorem, ipsum.</p>
          </div>

          <div class="account-username-container">
            <p class="account-lastname-title account-title">Họ:</p>
            <p class="account-lastname-text account-text">Lorem, ipsum.</p>
          </div>

          <div class="account-username-container">
            <p class="account-role-title account-title">Vai trò:</p>
            <p class="account-role-text account-text">Lorem, ipsum.</p>
          </div>
        </div>
        <p class="account-container-title account-container-title-password">Thay đổi mật khẩu</p>
        <p class="account-password-error">This is error</p>

        <form class="account-password-container-parent">
          <div class=" account-password-container account-current-password-container">
            <label class="account-password-label" for="current-password">Password Hiện tại:</label>
            <div class="account-password-input-container">
              <input name="password" class="account-password-input" id="current-password" type="password">
              <button type="button" show="none" class="account-password-input-btn" id="current-password-btn"><i
                  class="fas fa-eye"></i></button>
            </div>
          </div>
          <div class=" account-password-container account-new-password-container">
            <label class="account-password-label" for="new-password">Password mới:</label>
            <div class="account-password-input-container">
              <input name="new-password" class="account-password-input" id="new-password" type="password">
              <button type="button" class="account-password-input-btn" id="new-password-btn"><i
                  class="fas fa-eye"></i></button>
            </div>
          </div>
          <div class="account-password-container account-repeat-password-container">
            <label class="account-password-label" for="repeat-password">Nhập lại mật khẩu:</label>
            <div class="account-password-input-container">
              <input class="account-password-input" id="repeat-password" type="password">
              <button type="button" class="account-password-input-btn" id="repeat-password-btn"><i
                  class="fas fa-eye"></i></button>
            </div>
          </div>
        </form>

        <button class="account-password-submit" type="button">Thay đổi</button>

      </div>
    </div>
    <?php
include_once "./footer.php";
?>
  </section>

  <script src="./js/handleAccount.js"></script>

</body>

</html>
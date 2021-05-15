<?php
session_start();
?>
<?php
include_once "./header.php";
?>
<title>Dice Game</title>
</head>

<body>
  <section class="index-section">
    <nav class="nav-bar">
      <a href="./" class="index-href-logo">
        <i class="index-logo fas fa-dice"></i>
      </a>
      <div class="index-profile-container">
        <?php
if (isset($_SESSION["userName"])) {
  $username = $_SESSION["userName"];
  echo "<span class='index-profile-a' href='./login.php'><i class='index-logo-profile fas fa-user'></i>";
  echo "<span>$username</span></span>";
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
            <a href="./adminApproveList.php" style='color: rgb(18, 18, 18)'>Phê duyệt</a>
            <a href="./listProductAdmin.php">Ds sản phẩm</a>
          </div>

        </div>

      </div>
    </nav>

    <div class="wishlist-main">
      <ul class="wishlist-ul-item">
        <!-- item wish list will render in here -->
      </ul>
    </div>
    <?php
include_once "./footer.php";
?>
  </section>

  <script src="./js/handleApproveProduct.js"></script>
</body>

</html>
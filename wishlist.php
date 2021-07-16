<?php
session_start();
?>
<?php
include_once "./header.php";
?>
<link rel="stylesheet" href="tingle.min.css">
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
            <a href=""></a>
          </div>
          <div class="wish-list-container">
            <a href="./wishList.php">
              <p class="wish-list-text" style='color: rgb(18, 18, 18)'>Giỏ hàng</p>
              <div class="wish-list-number">0</div>
            </a>
          </div>

        </div>

      </div>
    </nav>

    <div class="wishlist-main">
      <ul class="wishlist-ul-item">
        <!-- item wish list will render in here -->
      </ul>
      <div class="own-product-total-container">
        <div class="own-product-total-container-inside">
          <h3 class="own-product-total-title">Tổng:</h3>
          <h3 class="own-product-total-text">0</h3>
        </div>

      </div>
      <div class="own-product-total-container">
        <button type="button" class="buy-all">Mua</button>
      </div>

    </div>
    <?php
include_once "./footer.php";
?>
  </section>
  <script src="tingle.min.js"></script>
  <script src="./js/handleWishList.js"></script>
</body>

</html>
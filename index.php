<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
  echo "<li class='index-nav-li'><a href=''>Tài Khoản</a></li>";
  echo "<li class='index-nav-li'><a href=''>Giỏ hàng</a></li>";
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
        <!-- <a class="index-profile-a" href="./login.php"><i class="fas fa-user"></i> <span> Log in</span></a>-->
        <div class="index-semi-nav-bar-left">
          <div class="browse-container">
            <a href="">Cửa hàng</a>
          </div>
          <div class="wish-list-container">
            <a href="./wishList.php">
              <i class="fas fa-shopping-cart"></i>
            </a>

          </div>
        </div>
        <div class="index-semi-nav-bar-right">
          <div class="index-search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Tim kiếm">
          </div>
        </div>
      </div>
    </nav>


    <div class="main">
      <aside class="aside"></aside>
      <div class="cart-container">
        <ul class="ul-cart">
        </ul>
      </div>
    </div>
  </section>

  <script src="./js/app.js"></script>
</body>

</html>
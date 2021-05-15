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
            <?php
if (isset($_SESSION["seller"])) {
  if ($_SESSION["seller"]) {
    echo "<a href='./'>Cửa hàng</a>";
    echo "<a href='./ownProduct.php'>Gian hàng</a>";
    echo "<a href='./market.php' style='color: rgb(18, 18, 18)'>Đăng game</a>";
  } else {
    echo "<a href=''>Cửa hàng</a>";
  }
}
?>
          </div>

        </div>
        <div class="index-semi-nav-bar-right">
          <div class="index-search-bar">

          </div>
        </div>
      </div>
    </nav>



    <form class="detail-main" method="POST" enctype="multipart/form-data" action="./includes/market.inc.php">
      <div class="detail-header">
        <div class="detail-header-img-container">
          <div class="detail-header-img detail-header-img-empty">
            <h3>Upload imagine</h3>
            <input class="market-input-file" type="file" required name="imgRepresentativeUrl">
          </div>
        </div>
        <div class="detail-header-price">
          <div class="detail-header-price-img">
            <h3>Upload imagine</h3>
            <input class="market-input-file" type="file" name="imgNameUrl" id="" required>
          </div>

          <div class="detail-header-price-btn-container">
            <h3>Price (USD)</h3>
            <input class="market-input-text market-input-text-price" type="text" name="price">
            <div class="detail-header-price-btn-container-btns">

            </div>
          </div>
        </div>
      </div>
      <div class="detail-info">
        <div class="detail-info-child detail-info-about">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Thông tin</h3>
          </div>
          <div class="detail-info-right">
            <div class="detail-info-right-developer-container">
              <h4>Developer</h4>
              <input class="market-input-text" type="text" placeholder="Ex:CD Project Red" name="developer" required>
            </div>
            <div class="detail-info-right-date-release-container">
              <h4>Release Date</h4>
              <input class="market-input-text" type="date" placeholder="Ex:2020-12-31 (yyyy-mm-dd)" name="dateRelease"
                required>
            </div>
            <div class="detail-info-right-tags-container">
              <h4>Tags</h4>
              <input class="market-input-text" type="text" placeholder="Ex:Action, RPG" name="tags" required>
            </div>
            <div class="detail-info-right-platform-container">
              <h4>Platform</h4>
              <input class="market-input-text" type="text" placeholder="Ex:Window" name="platform" required>
            </div>
          </div>
        </div>

        <div class="detail-info-child detail-info-follow">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Theo dõi chúng tôi</h3>
          </div>
          <div class="market-info-right">
            <div class="market-url-container">
              <div>
                <i class="logo-market fas fa-globe-americas"></i><span class="text">Website Link</span>
              </div>
              <input class="market-input-text" type="text" placeholder="Ex:https://www.game.com" name="websiteUrl"
                required>
            </div>
            <div class="market-url-container">
              <div>
                <i class="logo-market fab fa-facebook-square"></i><span class="text">Facebook Link</span>
              </div>
              <input class="market-input-text" type="text" placeholder="Ex:https://www.facbook.com/game"
                name="facebookUrl" required>
            </div>
          </div>
        </div>

        <div class="detail-info-child detail-info-specifications">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Cấu hình yêu cầu</h3>
          </div>


          <div class="detail-info-right">
            <div class="detail-info-right-os-container">
              <h4>Hệ điều hành</h4>
              <input class="market-input-text" type="text" placeholder="Ex: Window 8,10" name="os" required>
            </div>
            <div class="detail-info-right-processor-container">
              <h4>Bộ xử lý</h4>
              <input class="market-input-text" type="text" placeholder="Ex:Intel Core i5 6600K" name="processor"
                required>
            </div>
            <div class="detail-info-right-memory-container">
              <h4>Bộ nhớ</h4>
              <input class="market-input-text" type="text" placeholder="Ex:8GB" name="memory" required>
            </div>
            <div class="detail-info-right-storage-container">
              <h4>Lưu trữ</h4>
              <input class="market-input-text" type="text" placeholder="Ex:60GB" name="storage" required>
            </div>

            <div class="detail-info-right-directx-container">
              <h4>Direct X</h4>
              <input class="market-input-text" type="text" placeholder="11" name="directX" required>
            </div>
            <div class="detail-info-right-graphic-container">
              <h4>Card đồ hoạ</h4>
              <input class="market-input-text" type="text" placeholder="NVIDIA GeForce® GTX 660 2GB" name="graphics"
                required>
            </div>
          </div>
        </div>

        <div class="detail-info-child detail-info-post-image">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Image đề xuất trên browser</h3>
            </h3>
          </div>
          <div class="detail-info-right market-img-post-right">
            <div class="cart market-cart">
              <div class="cart-form">
                <div class="cart-url">
                  <div class="cart-img-box cart-img-box-post">
                    <input type="file" class="market-img-post-file" name="imgBrowseUrl" required>
                  </div>
                  <span class="cart-title">Lorem, ipsum.</span>
                  <span class="cart-description">Lorem ipsum dolor sit amet.</span>
                  <span class="cart-price">lorem</span>
                </div>
              </div>
            </div>
            <div>
              <h4>Game's name</h4>
              <input oninput="handleName(this)" class="market-input-text" type="text" placeholder="Star War 2"
                name="name" required>
            </div>
          </div>
        </div>

        <div class="detail-info-child market-submit-btn-container">
          <button name="submit-btn" class="market-submit-btn">Submit</button>
        </div>



      </div>
    </form>
    <?php
include_once "./footer.php";
?>

  </section>
  <script src="./js/handleMarketPost.js"></script>
</body>

</html>
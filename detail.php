<?php
session_start();
require_once "./includes/db.inc.php";
$userId = 0;

$row;

if (isset($_SESSION["id"])) {
  $userId = $_SESSION["id"];
}

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $query = "SELECT * FROM products WHERE id = $id;";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
}

$queryWishlist = "SELECT * FROM wishlist where userId = $userId;";
$resultWishlist = $conn->query($queryWishlist);

$queryPurchases = "SELECT * FROM purchases where usersId = $userId;";
$resultPurchases = $conn->query($queryPurchases);

function isExistPurchases($resultPurchases, $item)
{

  if (isset($_SESSION["id"])) {
    while ($rowPurchases = $resultPurchases->fetch_assoc()) {
      if ($rowPurchases["productsId"] == $item) {
        return true;
      }
    }
  }
  return false;

}

function isExistWishlist($resultWishlist, $item)
{
  if (isset($_SESSION["id"])) {
    while ($rowWishlist = $resultWishlist->fetch_assoc()) {
      if ($rowWishlist['productId'] == $item) {
        return true;
      }
    }
  }
  return false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./img/logoTitle.svg" type="image/x-icon" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="tingle.min.css">
  <link rel="stylesheet" href="./styles/style.css" />
  <title>Document</title>
</head>

<body>
  <section class="detail-section">
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
  echo "<li class='index-nav-li'><a href='./account.php'>T??i Kho???n</a></li>";
  echo "<li class='index-nav-li'><a href='./wishlist.php'>Gi??? h??ng</a></li>";
  echo "<li class='index-nav-li'><a href='./includes/handleMarketPage.inc.php'>Market</a></li>";

  if ($_SESSION["admin"] == 1) {
    echo "<li class='index-nav-li'><a href='./adminApproveList.php'>Admin</a></li>";
  }

  echo "<li class='index-nav-li'><a href='./includes/logout.inc.php'>????ng xu???t</a></li>";
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
            <a href="./">C???a h??ng</a>
          </div>
          <div class="wish-list-container">
            <a href="./wishList.php">
              <p class="wish-list-text">Gi??? h??ng</p>
              <div class="wish-list-number">0</div>
            </a>
          </div>
        </div>
      </div>
      <div class="index-semi-nav-bar-right">

      </div>
      </div>
    </nav>

    <div class="detail-main">
      <div class="detail-header">
        <div class="detail-header-img-container">
          <img class="detail-header-img" src="<?php echo $row["imgRepresentativeUrl"] ?>">
        </div>
        <div class="detail-header-price">
          <div class="detail-header-price-img" style="background-image: url('<?php echo $row["imgNameUrl"] ?>');">
          </div>
          <div class="detail-header-price-btn-container"> <span class="detail-header-price-btn-container-text">
              <?php echo $row["price"] == 0 ? "Mi???n Ph??" : $row["price"] . "$" ?></span>
            <div class="detail-header-price-btn-container-btns">

            </div>
          </div>
        </div>
      </div>
      <div class="detail-info">
        <div class="detail-info-child detail-info-about">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Th??ng tin v??? <?php echo $row["name"] ?></h3>
          </div>
          <div class="detail-info-right">
            <div class="detail-info-right-developer-container">
              <h4>Nh?? ph??t tri???n</h4>
              <h3><?php echo $row["developer"] ?></h3>
            </div>
            <div class="detail-info-right-date-release-container">
              <h4>Ng??y ra m???t</h4>
              <h3>
                <?php

$date = date_create($row["dateRelease"]);
echo date_format($date, "j M Y");
?>
              </h3>
            </div>
            <div class="detail-info-right-tags-container">
              <h4>Th??? lo???i</h4>
              <h3><?php echo $row["tags"] ?></h3>
            </div>
            <div class="detail-info-right-platform-container">
              <h4>N???n t???ng</h4>
              <h3>Window</h3>
            </div>
          </div>
        </div>

        <div class="detail-info-child detail-info-follow">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Theo d??i ch??ng t??i</h3>
          </div>
          <div class="detail-info-right">
            <a class="detail-info-right-follow-web" target="_blank" href="<?php echo $row["websiteUrl"] ?>"><i
                class="logo fas fa-globe-americas"></i><span class="text">Website</span></a>
            <a class="detail-info-right-follow-face" target="_blank" href="<?php echo $row["facebookUrl"] ?>"><i
                class="logo fab fa-facebook-square"></i><span class="text">Facebook</span></a>

          </div>
        </div>

        <div class="detail-info-child detail-info-specifications">
          <div class="detail-info-left">
            <h3 class="detail-info-left-text">Th??ng s??? k??? thu???t</h3>
          </div>


          <div class="detail-info-right">
            <div class="detail-info-right-os-container">
              <h4>H??? ??i???u h??nh</h4>
              <h3><?php echo $row["os"] ?></h3>
            </div>
            <div class="detail-info-right-processor-container">
              <h4>B??? x??? l??</h4>
              <h3><?php echo $row["processor"] ?></h3>
            </div>
            <div class="detail-info-right-memory-container">
              <h4>B??? nh???</h4>
              <h3><?php echo $row["memory"] ?></h3>
            </div>
            <div class="detail-info-right-storage-container">
              <h4>L??u tr???</h4>
              <h3><?php echo $row["storage"] ?></h3>
            </div>

            <div class="detail-info-right-directx-container">
              <h4>Direct X</h4>
              <h3><?php echo $row["directX"] ?></h3>
            </div>
            <div class="detail-info-right-graphic-container">
              <h4>Card ????? ho???</h4>
              <h3><?php echo $row["graphics"] ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php

include_once "./footer.php";
?>


  </section>
  <script src="tingle.min.js"></script>
  <script src="./js/handleDetail.js"></script>
</body>

</html>
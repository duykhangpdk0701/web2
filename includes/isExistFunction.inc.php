<?php

function isExistWishList($conn, $idUser, $idProduct) {
  $query = "SELECT * FROM wishlist WHERE userId = '$idUser' AND productId = '$idProduct';";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if ($row) {
    return true;
  } else {
    return false;
  }
}

function isExistPurchase($conn, $idsUser, $idsProduct) {
  $query = "SELECT * FROM purchases WHERE usersId = '$idsUser' AND productsId = '$idsProduct';";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if ($row) {
    return true;
  } else {
    return false;
  }
}
<?php

function loginUsername($conn, $username)
{
  $query = "SELECT * FROM users WHERE userNames = '$username';";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();

  if ($row) {
    return $row;
  } else {
    return false;
  }
}

function isSeller($conn, $userId)
{
  $query = "SELECT * FROM seller WHERE userId = '$userId';";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if ($row) {
    return true;
  } else {
    return false;
  }
}

function loginUser($conn, $username, $password)
{
  $loginUsername = loginUsername($conn, $username);

  if (!$loginUsername) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $passwordHash = $loginUsername["passwords"];
  $checkPassword = password_verify($password, $passwordHash);

  if ($checkPassword) {
    session_start();
    $_SESSION['firstName'] = $loginUsername["firstNames"];
    $_SESSION['lastName'] = $loginUsername['lastNames'];
    $_SESSION['userName'] = $loginUsername["userNames"];
    $_SESSION["id"] = $loginUsername["ids"];
    $_SESSION["admin"] = $loginUsername["admin"];
    $_SESSION["seller"] = isSeller($conn, $loginUsername["ids"]);

    header("location: ../index.php");
    exit();

  } else {
    header("location: ../login.php?error=wrongpassword");
    exit();
  }
}
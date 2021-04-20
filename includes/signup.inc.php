<?php

if (isset($_POST["submit"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $userName = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $passwordRepeat = $_POST["passwordRepeat"];

  require_once "./db.inc.php";
  require_once "./signupFunction.inc.php";

  if (!isValidUsername($userName)) {
    header("location: ../signup.php?error=invalidUsername");
    exit();
  } else if (!isValidEmail($email)) {
    header("location: ../signup.php?error=invalidEmail");
    exit();
  } else if (!isMatchPassword($password, $passwordRepeat)) {
    header("location: ../signup.php?error=passwordNotMatch");
    exit();
  } else if (usernamesExits($conn, $userName)) {
    header("location: ../signup.php?error=usernameTaken");
    exit();
  } else if (emailExits($conn, $email)) {
    header("location: ../signup.php?error=emailTaken");
    exit();
  } else {
    createUser($conn, $firstName, $lastName, $userName, $email, $password);
  }

}
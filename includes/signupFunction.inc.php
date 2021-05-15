<?php

function isMatchPassword($password, $passwordRepeat)
{
  if ($password === $passwordRepeat) {
    return true;
  } else {
    return false;
  }
}

function isValidEmail($email)
{
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function isValidUsername($username)
{
  if (preg_match(("/^[a-zA-Z0-9]*$/"), $username)) {
    return true;
  } else {
    return false;
  }
}

function createUser($conn, $firstName, $lastName, $username, $email, $password)
{

  $hashPassword = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (firstNames, lastNames, userNames, emails , passwords) VALUE ('$firstName' ,'$lastName', '$username', '$email' ,'$hashPassword');";
  $result = $conn->query($query);

  if ($result) {
    header("location: ../signup.php?error=querySucceed");
    exit();
  } else {
    header("location: ../signup.php?error=queryFails");
    exit();
  }

  $result->free_result();
  $conn->close();
}

function usernamesExits($conn, $username)
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

function emailExits($conn, $email)
{
  $query = "SELECT * FROM users WHERE emails = '$email';";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  if ($row) {
    return $row;
  } else {
    return false;
  }
}
<?php

session_start();
include_once "./db.inc.php";

class Product
{
  public $name;
  public $price;
  public $imgBrowseUrl;
  public $imgNameUrl;
  public $imgRepresentativeUrl;
  public $developer;
  public $dateRelease;
  public $tags;
  public $platform;
  public $description;
  public $facebookUrl;
  public $websiteUrl;
  public $os;
  public $processor;
  public $memory;
  public $storage;
  public $directX;
  public $graphics;
  public $sellerId;

  // public function __construct($name, $price, $imgBrowseUrl, $imgNameUrl, $imgRepresentativeUrl, $developer, $dateRelease, $tags, $platform, $description, $facebookUrl, $websiteUrl, $os, $processor, $memory, $storage, $directX, $graphics, $sellerId)
  // {
  //   $this->name = $name;
  //   $this->price = $price;
  //   $this->imgBrowseUrl = $imgBrowseUrl;
  //   $this->imgNameUrl = $imgNameUrl;
  //   $this->imgRepresentativeUrl = $imgRepresentativeUrl;
  //   $this->developer = $developer;
  //   $this->dateRelease = $dateRelease;
  //   $this->tags = $tags;
  //   $this->platform = $platform;
  //   $this->description = $description;
  //   $this->facebookUrl = $facebookUrl;
  //   $this->websiteUrl = $websiteUrl;
  //   $this->os = $os;
  //   $this->processor = $processor;
  //   $this->memory = $memory;
  //   $this->storage = $storage;
  //   $this->directX = $directX;
  //   $this->graphics = $graphics;
  //   $this->sellerId = $sellerId;

  // }

  public function __construct()
  {
    $this->name = null;
    $this->price = 0;
    $this->imgBrowseUrl = null;
    $this->imgNameUrl = null;
    $this->imgRepresentativeUrl = null;
    $this->developer = null;
    $this->dateRelease = null;
    $this->tags = null;
    $this->platform = null;
    $this->facebookUrl = null;
    $this->websiteUrl = null;
    $this->os = null;
    $this->processor = null;
    $this->memory = null;
    $this->storage = null;
    $this->directX = null;
    $this->graphics = null;
    $this->sellerId = 0;

  }

  public function uploadImgBrowserUrl()
  {
    $reName = "";
    if ($_FILES["imgBrowseUrl"]["error"] > 0) {
      die("file upp load error");
      exit();
    } else {
      $imgName = $_FILES["imgBrowseUrl"]["name"];
      $extension = pathinfo($imgName, PATHINFO_EXTENSION);
      $reName = $this->name . "-imgBrowseUrl" . '.' . $extension;
      $reName = str_replace(' ', '', $reName);
      move_uploaded_file($_FILES["imgBrowseUrl"]["tmp_name"], "../img/" . $reName) or die("upload file fail");

      return "./img/" . $reName;
    }

  }

  public function uploadImgRepresentativeUrl()
  {
    $reName = "";
    if ($_FILES["imgRepresentativeUrl"]["error"] > 0) {
      die("file upp load error");
      exit();
    } else {
      $imgName = $_FILES["imgRepresentativeUrl"]["name"];
      $extension = pathinfo($imgName, PATHINFO_EXTENSION);
      $reName = $this->name . "-imgRepresentativeUrl" . '.' . $extension;
      $reName = str_replace(' ', '', $reName);
      move_uploaded_file($_FILES["imgRepresentativeUrl"]["tmp_name"], "../img/" . $reName) or die("upload file fail");

      return "./img/" . $reName;
    }

  }

  public function uploadImgNameUrl()
  {
    $reName = "";
    if ($_FILES["imgNameUrl"]["error"] > 0) {
      die("file upp load error");
      exit();
    } else {
      $imgName = $_FILES["imgNameUrl"]["name"];
      $extension = pathinfo($imgName, PATHINFO_EXTENSION);
      $reName = $this->name . "-imgNameUrl" . '.' . $extension;
      $reName = str_replace(' ', '', $reName);
      move_uploaded_file($_FILES["imgNameUrl"]["tmp_name"], "../img/" . $reName) or die("upload file fail");

      return "./img/" . $reName;
    }

  }

  public function setData()
  {
    try {
      $this->name = $_POST["name"];
      $this->price = floatval($_POST["price"]);
      $this->imgBrowseUrl = $this->uploadImgBrowserUrl();
      $this->imgNameUrl = $this->uploadImgNameUrl();
      $this->imgRepresentativeUrl = $this->uploadImgRepresentativeUrl();
      $this->developer = $_POST["developer"];
      $this->dateRelease = $_POST["dateRelease"];
      $this->tags = $_POST["tags"];
      $this->platform = $_POST["platform"];
      $this->facebookUrl = $_POST["facebookUrl"];
      $this->websiteUrl = $_POST["websiteUrl"];
      $this->os = $_POST["os"];
      $this->processor = $_POST["processor"];
      $this->memory = $_POST["memory"];
      $this->storage = $_POST["storage"];
      $this->directX = $_POST["directX"];
      $this->graphics = $_POST["graphics"];
      $this->sellerId = intval($_SESSION["id"]);
    } catch (Exception $e) {
      die("send data failed,  err: " . $e->getMessage());
    }

  }

  public function sendData($conn)
  {
    $query = "INSERT INTO productsawaitapproved (`name`, `price`, `imgBrowseUrl`, `imgNameUrl`, `imgRepresentativeUrl`, `developer`, `dateRelease`,  `tags`, `platform`, `facebookUrl`, `websiteUrl`, `os`, `processor`, `memory`, `storage`, `directX`, `graphics`, `sellerId`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = $conn->prepare($query) or die("stmt failed");
    $stmt->bind_param("ssssssssssssssssss", $this->name, $this->price, $this->imgBrowseUrl, $this->imgNameUrl, $this->imgRepresentativeUrl, $this->developer, $this->dateRelease, $this->tags, $this->platform, $this->facebookUrl, $this->websiteUrl, $this->os, $this->processor, $this->memory, $this->storage, $this->directX, $this->graphics, $this->sellerId) or die("stmt param failed");
    $stmt->execute() or die("stmt execute fail");
    $stmt->close();
  }

}

$product = new Product();
if (isset($_POST["submit-btn"])) {
  $product->setData();
  $product->sendData($conn);
  header("location: ../index.php?message=postProductSucceed");
}
const handleWishlistBtn = (e) => {
  const xmlhttp = new XMLHttpRequest();
  const method = "POST";
  const url = "./includes/handleWishlistPost.php";
  const productId = e.getAttribute("idProduct");

  xmlhttp.open(method, url, true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  const btnType = getAttribute("typeBtn");
  if (btnType === "add") {
    xmlhttp.send(`userId=${userId}&productId=${productId}&method=add}`);
  } else if ((btnType = "remove")) {
    xmlhttp.send(`userId=${userId}&productId=${productId}&method=remove}`);
  }

  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    } else {
      console.warn("not receiving data");
    }
  };
};

export default handleWishlistBtn;

let userId;

const fetchDataWishList = () => {
  const wishlistUlItem = document.querySelector(".wishlist-ul-item");

  const xmlhttp = new XMLHttpRequest();
  const method = "GET";
  const url = "./includes/handleWishlist.php";

  xmlhttp.open(method, url, true);
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      let render = "";
      const data = JSON.parse(xmlhttp.responseText);
      data.forEach((element) => {
        userId = element.userId;

        render += `<li class="wishlist-li-item">
          <a href="./detail.php?id=${
            element.productId
          }" class="wishlist-item-url" alt="lalala">
            <img class="wishlist-img" src="${
              element.imgRepresentativeUrl
            }" alt="">
            <div class="wishlist-text-container">
              <span class="wishlist-item-name">${element.name}</span>
              <span class="wishlist-item-price">${
                element.price == 0 ? "Free" : element.price + "$"
              }</span>
            </div>
          </a>
          <button title="Remove From wishlist" onclick="handleRemoveBtn(this)" idProduct="${
            element.productId
          }" class="wishlist-remove-btn"><i
              class="wish-list-icon-remove fas fa-trash"></i></button>
        </li>`;
      });

      wishlistUlItem.innerHTML = render;
    } else {
      console.warn("not receiving data");
    }
  };

  xmlhttp.send();
};

const handleRemoveBtn = (e) => {
  const xmlhttp = new XMLHttpRequest();
  const method = "POST";
  const url = "./includes/handleWishlistPost.php";
  const productId = e.getAttribute("idProduct");

  xmlhttp.open(method, url, true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xmlhttp.send(`userId=${userId}&productId=${productId}`);

  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      fetchDataWishList();
    } else {
      console.warn("not receiving data");
    }
  };
};

const app = () => {
  fetchDataWishList();
};

app();

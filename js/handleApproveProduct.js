let userId;
let userData;

const findUserById = (userId) => {
  for (const iterator of userData) {
    if (iterator.ids == userId) {
      return iterator;
    }
  }
  return null;
};

const fetchDataWishList = async () => {
  const wishlistUlItem = document.querySelector(".wishlist-ul-item");

  const data = await fetch("./includes/listAwaitProduct.inc.php").then((data) =>
    data.json(),
  );

  userData = await fetch("./includes/listUser.inc.php").then((data) =>
    data.json(),
  );

  let render = "";
  data.forEach((element) => {
    render += `<li class="wishlist-li-item">
    <a href="./detailAwait.php?id=${
      element.id
    }" class="wishlist-item-url" alt="lalala">
            <img class="wishlist-img" src="${
              element.imgRepresentativeUrl
            }" alt="">
            <div class="wishlist-text-container">
              <span class="wishlist-item-name">${element.name}</span>
              <span class="approve-product-item-info-container">
                <div class="approve-product-item-post-by-container">
                  <h6>Đăng bởi:</h6>
                  <h5>${findUserById(element.sellerId).userNames}</h5>
                </div>
                <span class="wishlist-item-price">${
                  element.price == 0 ? "Free" : element.price + "$"
                }</span>
              </span>
            </div>
          </a>
          <button title="Remove From wishlist" onclick="handleApproveBtn(this)" idProduct="${
            element.id
          }" class="wishlist-remove-btn"><i class="wishlist-check-btn fas fa-check"></i></button>
          </li>`;
  });
  wishlistUlItem.innerHTML = render;
};

const handleApproveBtn = async (e) => {
  const xmlhttp = new XMLHttpRequest();
  const method = "POST";
  const url = "./includes/approveProduct.inc.php";
  const productId = e.getAttribute("idProduct");

  xmlhttp.open(method, url, true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xmlhttp.send(`productId=${productId}&action=withAjax`);

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

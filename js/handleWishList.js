let userId;

const renderAmountWishlist = (wishlistLength) => {
  const amountWishlist = document.querySelector(".wish-list-number");
  amountWishlist.textContent = wishlistLength;
};

const fetchDataWishList = async () => {
  const wishlistUlItem = document.querySelector(".wishlist-ul-item");
  const totalElement = document.querySelector(".own-product-total-text");
  let total = 0;

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
        total += parseFloat(element.price);

        render += `<li name='productId' idProduct="${
          element.productId
        }" class="wishlist-li-item">
          <a href="./detail.php?id=${
            element.productId
          }" class="wishlist-item-url" alt="lalala">
            <img class="wishlist-img" src="${
              element.imgRepresentativeUrl
            }" alt="">
            <div class="wishlist-text-container">
              <span class="wishlist-item-name">${element.name}</span>
              <span class="wishlist-item-price">${
                element.price == 0 ? "Miễn phí" : element.price + "$"
              }</span>
            </div>
          </a>
          <button title="Remove From wishlist" onclick="handleRemoveBtn(this)" idProduct="${
            element.productId
          }" class="wishlist-remove-btn"><i
              class="wish-list-icon-remove fas fa-trash"></i></button>
        </li>`;
      });
      renderAmountWishlist(data.length);
      wishlistUlItem.innerHTML = render;
      totalElement.textContent = total + "$";
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

  xmlhttp.send(`userId=${userId}&productId=${productId}&method=remove`);

  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      fetchDataWishList();
    } else {
      console.warn("not receiving data");
    }
  };
};

const popupBox = (listIdWishlist) => {
  var modal = new tingle.modal({
    footer: true,
    stickyFooter: false,
    closeMethods: ["overlay", "button", "escape"],
    closeLabel: "Close",
    cssClass: ["custom-class-1", "custom-class-2"],
  });

  modal.setContent("<h1>Bạn có muốn mua tất cả sản phẩm này chứ ?</h1>");

  modal.addFooterBtn(
    "từ chối",
    "tingle-btn tingle-btn--danger tingle-btn--pull-right",
    function () {
      modal.close();
    },
  );

  modal.addFooterBtn(
    "Đồng ý",
    "tingle-btn tingle-btn--primary tingle-btn--pull-right",
    function () {
      const form = document.querySelector(".wishlist-main");

      listIdWishlist.forEach((item) => {
        const xmlhttp = new XMLHttpRequest();
        const method = "POST";
        const url = "./includes/handleWishlistPost.php";
        const productId = item.getAttribute("idProduct");

        xmlhttp.open(method, url, true);
        xmlhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded",
        );

        xmlhttp.send(`productId=${productId}&method=buy`);

        xmlhttp.onreadystatechange = () => {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            fetchDataWishList();
          } else {
            console.warn("not receiving data");
          }
        };
      });

      form.submit();
      modal.close();
    },
  );

  modal.open();
};

const handleBuyAll = () => {
  const listIdWishlist = document.querySelectorAll(".wishlist-li-item");

  const btn = document.querySelector(".buy-all");
  btn.addEventListener("click", () => {
    popupBox(listIdWishlist);
  });
};

const app = async () => {
  await fetchDataWishList();

  setTimeout(() => {
    handleBuyAll();
  }, 500);
};

app();

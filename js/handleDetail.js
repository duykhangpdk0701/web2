let product;
let wishlist;
let purchase;

const isExistInWishlist = (data) => {
  return wishlist.map((item) => item.productId).indexOf(data[0].id);
};

const isExistInPurchase = (data) => {
  return purchase.map((item) => item.productsId).indexOf(data[0].id);
};

const render = (data) => {
  const BtnContainer = document.querySelector(
    ".detail-header-price-btn-container-btns",
  );

  if (isExistInPurchase(data) >= 0) {
    BtnContainer.innerHTML = `
    <button class="detail-header-price-btn-container-btns-buy detail-header-price-btn-container-btns-buyed" name="buyNowBtn">đẫ mua</button>
    <button class="detail-header-price-btn-container-btns-add detail-header-price-btn-container-btns-buyed" name="addBtn"><i class="fas fa-check"></i></button>
      `;
  } else if (isExistInWishlist(data) >= 0) {
    BtnContainer.innerHTML = `
    <button onClick="handleBtn(this)" typeBtn="buy" class="detail-header-price-btn-container-btns-buy" name="buyNowBtn">Mua</button>
    <button onClick="handleBtn(this)" typeBtn="remove" class="detail-header-price-btn-container-btns-add" name="removeBtn"><i class="fas fa-check"></i></button>
      `;
  } else {
    BtnContainer.innerHTML = `
      <button onClick="handleBtn(this)" typeBtn="buy" class="detail-header-price-btn-container-btns-buy" name="buyNowBtn">Mua</button>
      <button onClick="handleBtn(this)" typeBtn="add" class="detail-header-price-btn-container-btns-add" name="addBtn"><i class="fas fa-plus"></i></button>
      `;
  }
};

const renderWithCallback = async (data, callback1, callback2) => {
  const BtnContainer = document.querySelector(
    ".detail-header-price-btn-container-btns",
  );
  await callback1();
  await callback2();

  if (isExistInPurchase(data) >= 0) {
    BtnContainer.innerHTML = `
    <button class="detail-header-price-btn-container-btns-buy detail-header-price-btn-container-btns-buyed" name="buyNowBtn">đẫ mua</button>
    <button class="detail-header-price-btn-container-btns-add detail-header-price-btn-container-btns-buyed" name="addBtn"><i class="fas fa-check"></i></button>
      `;
  } else if (isExistInWishlist(data) >= 0) {
    BtnContainer.innerHTML = `
    <button onClick="handleBtn(this)" typeBtn="buy" class="detail-header-price-btn-container-btns-buy" name="buyNowBtn">Mua</button>
    <button onClick="handleBtn(this)" typeBtn="remove" class="detail-header-price-btn-container-btns-add" name="removeBtn"><i class="fas fa-check"></i></button>
      `;
  } else {
    BtnContainer.innerHTML = `
      <button onClick="handleBtn(this)" typeBtn="buy" class="detail-header-price-btn-container-btns-buy" name="buyNowBtn">Mua</button>
      <button onClick="handleBtn(this)" typeBtn="add" class="detail-header-price-btn-container-btns-add" name="addBtn"><i class="fas fa-plus"></i></button>
      `;
  }
};

const fetchWishlist = async () => {
  wishlist = await fetch("./includes/listWishlist.inc.php").then((data) =>
    data.json(),
  );
};

const fetchPurchase = async () => {
  purchase = await fetch("./includes/listPurchases.inc.php").then((data) =>
    data.json(),
  );
};

const fetchData = (callbackFunc1, callbackFun2) => {
  const xmlhttp = new XMLHttpRequest();
  const method = "GET";
  const url = "./includes/listProduct.inc.php";
  const windowUrl = window.location.search;
  const windowUrlParam = new URLSearchParams(windowUrl);

  xmlhttp.open(method, url + `?id=${windowUrlParam.get("id")}`, true);

  xmlhttp.onreadystatechange = async () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      await callbackFunc1();
      await callbackFun2();
      product = await JSON.parse(xmlhttp.responseText);
      render(product);
    } else {
      console.warn("data response failed");
    }
  };

  xmlhttp.send();
};

const handleBtn = (e) => {
  const xmlhttp = new XMLHttpRequest();
  const method = "POST";
  const url = "./includes/handleWishlistPost.php";
  const windowUrl = window.location.search;
  const windowUrlParam = new URLSearchParams(windowUrl);
  const productId = windowUrlParam.get("id");

  xmlhttp.open(method, url, true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  const btnType = e.getAttribute("typeBtn");

  if (btnType === "add") {
    xmlhttp.send(`productId=${productId}&method=add`);
  } else if (btnType === "remove") {
    xmlhttp.send(`productId=${productId}&method=remove`);
  } else if (btnType === "buy") {
    console.log("click buy");
    xmlhttp.send(`productId=${productId}&method=buy`);
  }

  xmlhttp.onreadystatechange = async () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      try {
        const error = JSON.parse(xmlhttp.responseText);
        console.log(error);
        if (error.message === "unidentified id") {
          window.location.href = "./login.php";
        }
      } catch (e) {}

      renderWithCallback(product, fetchPurchase, fetchWishlist);
    }
  };
};

const app = () => {
  fetchData(fetchWishlist, fetchPurchase);
};

app();

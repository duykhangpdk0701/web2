const fetchPurchase = async () => {
  const data = await fetch("./includes/handleMarketOwn.inc.php").then((data) =>
    data.json(),
  );
  return data;
};

const getOccurrence = (array, value) => {
  let count = 0;
  array.forEach((item) => {
    if (item.productsId == value) {
      count++;
    }
  });
  return count;
};

const fetchOwnProduct = async () => {
  let total = 0;
  const totalEarn = document.querySelector(".own-product-total-text");
  const ownProductUl = document.querySelector(".wishlist-ul-item");
  const data = await fetch("./includes/handleOwnProduct.inc.php").then((data) =>
    data.json(),
  );

  const dataPurchase = await fetch(
    "./includes/handleMarketOwn.inc.php",
  ).then((data) => data.json());

  const resetData = data.map((item) => {
    let amountSoldCalc = getOccurrence(dataPurchase, item.id);
    let totalEarnCalc = item.price * amountSoldCalc;
    total += totalEarnCalc;
    return {
      id: item.id,
      imgRepresentativeUrl: item.imgRepresentativeUrl,
      name: item.name,
      price: item.price,
      amountSold: amountSoldCalc,
      totalEarn: totalEarnCalc,
    };
  });

  let render = "";
  resetData.forEach((element) => {
    render += `<li class="wishlist-li-item ">
    <a href="./detail.php?id=${
      element.id
    }" class="wishlist-item-url wishlist-item-url-no-btn" alt="lalala">
            <img class="wishlist-img" src="${element.imgRepresentativeUrl}">
            <div class="wishlist-text-container">
              <span class="wishlist-item-name">${element.name}</span>
              <span class="wishlist-item-price">${
                element.price == 0 ? "Miễn phí" : element.price + "$"
              }</span>
              </div>
          </a>
          <div class="own-product-container">
            <div class="own-product-sold">
              <h6>Đã bán:</h6>
              <h4>${element.amountSold}</h4>
            </div>
            <div class="own-product-earn">
              <h6>Tổng tiền thu được:</h6>
              <h4>${element.totalEarn}$</h4>
            </div>
          </div>
          </li>`;
  });
  ownProductUl.innerHTML = render;
  totalEarn.textContent = total + "$";
};

const app = () => {
  fetchOwnProduct();
  fetchPurchase();
};

app();

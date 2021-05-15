let listPurchase;

const fetchListPurchase = async () => {
  const data = await fetch("./includes/handlePurchases.inc.php").then((data) =>
    data.json(),
  );
  listPurchase = data;
  console.log(data);
};

const render = () => {
  const wishlistUlItem = document.querySelector(".wishlist-ul-item");
  let render = "";

  listPurchase.forEach((element) => {
    const date = new Date(element.purchasesDate);
    const option = {
      year: "numeric",
      month: "long",
      day: "numeric",
    };

    render += `<li class="wishlist-li-item">
          <a href="./detail.php?id=${
            element.productsId
          }" class="wishlist-item-url" alt="lalala">
            <img class="wishlist-img" src="${
              element.imgRepresentativeUrl
            }" alt="">
            <div class="wishlist-text-container">
              <span class="wishlist-item-name">${element.name}</span>
              <div class="purchases-item-date">
                <span class="purchases-item-date-title">ngày mua</span>
                <span class="purchases-item-date-text" >${date.toLocaleDateString(
                  "en-US",
                  option,
                )}</span>
              </div>
            </div>
          </a>
        </li>`;
  });

  wishlistUlItem.innerHTML = render;
};

const app = async () => {
  await fetchListPurchase();
  render();
};
app();

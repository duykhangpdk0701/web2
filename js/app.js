let wishlist;
let purchase;
let product;

const isExistInWishlist = (id, wishlist) => {
  if (wishlist.includes(id)) {
    return true;
  }
  return false;
};

const isExistInPurchasesList = (id, purchase) => {
  if (purchase.includes(id)) {
    return true;
  }
  return false;
};

const fetchDataPurchase = () => {
  const xmlhttp = new XMLHttpRequest();
  const method = "GET";
  const url = "./includes/listPurchases.inc.php";

  xmlhttp.open(method, url, true);
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      const data = JSON.parse(xmlhttp.responseText);
      purchase = data.map((element) => element.productsId);
    } else {
      console.warn("not receiving data");
    }
  };

  xmlhttp.send();
};

const fetchDataWishList = () => {
  const xmlhttp = new XMLHttpRequest();
  const method = "GET";
  const url = "./includes/listWishlist.inc.php";

  xmlhttp.open(method, url, true);
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      const data = JSON.parse(xmlhttp.responseText);
      wishlist = data.map((element) => element.productId);
    } else {
      console.warn("not receiving data");
    }
  };

  xmlhttp.send();
};

const renderData = (data) => {
  const ulCart = document.querySelector(".ul-cart");
  let render = "";
  data.forEach((element) => {
    render += `<li class="cart">
    <form method="POST" action="./includes/addItemToWishList.inc.php?id=${element.id}" >
      <a href="./detail.php?id=${element.id}" class="cart-url">
      <div class="cart-img-box">
      <img src="${element.imgBrowseUrl}" alt="">`;

    if (isExistInPurchasesList(element.id, purchase)) {
      render += `<button type="button" class='card-svg green-btn' title="Own this game">
      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M20 29C24.9706 29 29 24.9706 29 20C29 15.0294 24.9706 11 20 11C15.0294 11 11 15.0294 11 20C11 24.9706 15.0294 29 20 29Z" fill="#2ECC71" stroke="white" stroke-width="2"/>
      <path d="M15.5 20L18.5 23L24.5 17" fill="#2ECC71"/>
      <path d="M15.5 20L18.5 23L24.5 17" stroke="white" stroke-width="2"/>
      </svg>
  </button>
  `;
    } else if (isExistInWishlist(element.id, wishlist)) {
      render += `<button class="card-svg" name="removeBtn" title="Remove from wishlist" >
      <svg xmlns="http://www.w3.org/2000/svg" class="svg css-wpyjus-Icon__svg" viewBox="0 0 40 40">
      <g filter="url(#filter0_d)">
        <circle cx="20" cy="20" r="10" fill="currentColor" fill-opacity="0.72"></circle>
      </g>
      <g>
        <circle cx="20" cy="20" r="9" stroke="white" stroke-width="2"></circle>
        <path d="M15.5 20L18.5 23L24.5 17" stroke="white" stroke-width="2"></path>
      </g>
      <defs>
        <filter id="filter0_d" x="0" y="0" width="40" height="40" filterUnits="userSpaceOnUse"
          color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0">
          </feColorMatrix>
          <feOffset></feOffset>
          <feGaussianBlur stdDeviation="5"></feGaussianBlur>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.4 0"></feColorMatrix>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
        </filter>
      </defs>
    </svg>
                    </button>`;
    } else {
      render += `<button class="card-svg" name="addBtn" title="Add to wishlist" >
      <svg xmlns="http://www.w3.org/2000/svg" class="svg css-wpyjus-Icon__svg" viewBox="0 0 40 40">
      <g filter="url(#filter0_d)">
        <circle cx="20" cy="20" r="10" fill="currentColor" fill-opacity="0.72"></circle>
      </g>
      <g>
        <circle cx="20" cy="20" r="9" stroke="white" stroke-width="2"></circle>
        <line x1="20" y1="15" x2="20" y2="25" stroke="white" stroke-width="2"></line>
        <line x1="15" y1="20" x2="25" y2="20" stroke="white" stroke-width="2"></line>
      </g>
      <defs>
        <filter id="filter0_d" x="0" y="0" width="40" height="40" filterUnits="userSpaceOnUse"
          color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0">
          </feColorMatrix>
          <feOffset></feOffset>
          <feGaussianBlur stdDeviation="5"></feGaussianBlur>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.4 0"></feColorMatrix>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
        </filter>
      </defs>
    </svg>
                    </button>`;
    }

    render += `</div>
          <span class="cart-title">${element.name}</span>
          <span class="cart-description">${element.developer}</span>
          <span class="cart-price">${
            element.price == 0 ? "Miễn phí" : element.price + "$"
          }</span>
          </a>
      </form>
    </li>`;
  });

  ulCart.innerHTML = render;
};

const fetchData = () => {
  const xmlhttp = new XMLHttpRequest();
  const method = "GET";
  const url = "./includes/listProduct.inc.php";

  xmlhttp.open(method, url, true);
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      const data = JSON.parse(xmlhttp.responseText);
      product = data;
      renderData(data);
    } else {
      console.warn("not receiving data");
    }
  };

  xmlhttp.send();
};

const handleSearchingBar = () => {
  const searchingBar = document.querySelector("#search-bar");

  searchingBar.addEventListener("input", () => {
    const filRender = product.filter((item) => {
      const reg = new RegExp(searchingBar.value.toLowerCase());
      return reg.test(item.name.toLowerCase());
    });

    renderData(filRender);
  });
};

const app = () => {
  fetchDataPurchase();
  fetchDataWishList();
  fetchData();
  handleSearchingBar();
};

app();

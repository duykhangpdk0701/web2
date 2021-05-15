let listProduct;

const handleInputNumber = () => {
  const inputPrice = document.querySelector(".market-input-text-price");
  inputPrice.onkeydown = (e) => {
    if (
      !(
        (e.keyCode > 95 && e.keyCode < 106) ||
        (e.keyCode > 47 && e.keyCode < 58) ||
        e.keyCode == 8
      )
    ) {
      return false;
    }
  };
};

const isExistProductName = (name) => {
  for (const iterator of listProduct) {
    if (name.toLowerCase() === iterator.name.toLowerCase()) {
      return true;
    }
  }
  return false;
};

const handleName = (e) => {
  const submitBtn = document.querySelector(".market-submit-btn");
  console.log("changing");
  if (!isExistProductName(e.value)) {
    submitBtn.classList.add("market-submit-btn-active");
  } else {
    submitBtn.classList.remove("market-submit-btn-active");
  }
};

const fetchListProduct = async () => {
  listProduct = await fetch("./includes/listProduct.inc.php").then((data) =>
    data.json(),
  );
  console.log(listProduct);
};

const app = async () => {
  const submitBtn = document.querySelector(".market-submit-btn");
  submitBtn.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
      e.preventDefault();
    }
  });
  await fetchListProduct();
  handleInputNumber();
};

app();

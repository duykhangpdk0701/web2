let listProduct = [];
let listUser = [];

const fetchListProduct = async () => {
  listProduct = await fetch("./includes/listProduct.inc.php")
    .then((data) => data.json())
    .then((data) => data.reverse());
};

const fetchListUser = async () => {
  listUser = await fetch("./includes/listUser.inc.php").then((data) =>
    data.json(),
  );
};

const findUserById = (userId) => {
  for (const iterator of listUser) {
    if (iterator.ids == userId) {
      return iterator;
    }
  }
  return null;
};

const findAdminById = (adminId) => {
  for (const iterator of listUser) {
    if (iterator.ids == adminId && iterator.admin == 1) {
      return iterator;
    }
  }
  return null;
};

const renderUl = () => {
  const wishlistUlItem = document.querySelector(".wishlist-ul-item");
  let render = `
  <tr>
    <th>Tên game</th>
    <th>Đăng bởi</th>
    <th>Duyệt bởi</th>
    <th style="text-align:center">Trạng thái</th>
  </tr>
  `;

  listProduct.forEach((element) => {
    const btn =
      element.status == 1
        ? `<button onClick="handleStatus(this)" idProduct="${element.id}" status="1" class="admin-list-product-btn admin-list-product-btn-able">Đang hoạt động</button>`
        : `<button onClick="handleStatus(this)" idProduct="${element.id}" status="0" class="admin-list-product-btn admin-list-product-btn-disable">Đã vô hiệu hoá</button>`;

    render += `
    <tr>
      <td>
        <span class="wishlist-item-name">
          ${element.name}
        </span></td>
      <td>
        <span>
          ${findUserById(element.sellerId).userNames}
        </span>
      </td>
      <td>
        <span>
        ${findAdminById(element.adminApproveId).userNames}
        </span>
      </td>
      <td class="admin-list-table-status">
        <span>
          ${btn}
        </span>
      </td>
    </tr>
    
    `;
  });

  wishlistUlItem.innerHTML = render;
};

const postStatus = async (method, id) => {
  const result = await fetch(
    `./includes/handleStatus.inc.php?method=${method}&idProduct=${id}`,
  );
  return result;
};

const handleStatus = async (e) => {
  if (e.getAttribute("status") == 1) {
    await postStatus("disable", e.getAttribute("idProduct"));
    await fetchListProduct();
    renderUl();
  } else {
    await postStatus("able", e.getAttribute("idProduct"));
    await fetchListProduct();
    renderUl();
  }
};

const app = async () => {
  await fetchListProduct();
  await fetchListUser();
  renderUl();
};

app();

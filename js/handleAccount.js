let listUser;

const fetchUser = async () => {
  listUser = await fetch("./includes/listUser.inc.php").then((data) =>
    data.json(),
  );
};

const render = () => {
  const username = document.querySelector(".account-username-text");
  const email = document.querySelector(".account-email-text");
  const firstName = document.querySelector(".account-firstname-text");
  const lastName = document.querySelector(".account-lastname-text");
  const role = document.querySelector(".account-role-text");
  const currentUser = document.querySelector(".current-user").textContent;

  for (const iterator of listUser) {
    console.log(iterator.userNames);
    if (iterator.userNames == currentUser) {
      username.textContent = iterator.userNames;
      email.textContent = iterator.emails;
      firstName.textContent = iterator.firstNames;
      lastName.textContent = iterator.lastNames;
      role.textContent = iterator.admin == 1 ? "admin" : "user";
      break;
    }
  }
};

const isCorrectPassword = async () => {
  const form = document.querySelector(".account-password-container-parent");
  const data = new FormData(form);
  let result = "";

  await fetch("./includes/handleChangePassword.php?action=check", {
    method: "post",
    body: data,
  })
    .then((response) => {
      return response.text();
    })
    .then((text) => {
      result = text;
    });

  return result;
};

const changePassword = async () => {
  const form = document.querySelector(".account-password-container-parent");
  const data = new FormData(form);
  let result = "";

  await fetch("./includes/handleChangePassword.php?action=change", {
    method: "post",
    body: data,
  })
    .then((response) => {
      return response.text();
    })
    .then((text) => {
      result = text;
    });

  return result;
};

const handlePassword = async () => {
  const currentPassword = document.querySelector("#current-password");
  const newPassword = document.querySelector("#new-password");
  const repeatPassword = document.querySelector("#repeat-password");
  const submitBtn = document.querySelector(".account-password-submit");
  const error = document.querySelector(".account-password-error");

  submitBtn.addEventListener("click", async () => {
    error.style.display = "none";
    error.style.backgroundColor = "rgb(213, 72, 65)";
    const result = await isCorrectPassword(currentPassword);

    if (result === "not match password") {
      currentPassword.value = "";
      currentPassword.focus();
      error.textContent = "Sai mật khẩu";
      error.style.display = "block";
      return;
    } else if (newPassword.value !== repeatPassword.value) {
      error.style.display = "block";
      error.textContent =
        "Mật khẩu mới và trường nhập lại mật khẩu không giống nhau";
      return;
    } else if (currentPassword.value === newPassword.value) {
      error.style.display = "block";
      error.textContent = "Mật khẩu hiện tại và mật khẩu mới giống nhau";
      currentPassword.focus();
      currentPassword.value = "";
      return;
    } else if (result === "match password") {
      await changePassword();
      error.style.display = "block";
      error.textContent = "Mật khẩu thay đổi thành công";
      error.style.backgroundColor = "#2ecc71";
      currentPassword.value = "";
      newPassword.value = "";
      repeatPassword.value = "";
      return;
    }
  });
};

const hideAndShowPassword = () => {
  const currentPassword = {
    input: document.querySelector("#current-password"),
    btn: document.querySelector("#current-password-btn"),
  };

  const newPassword = {
    input: document.querySelector("#new-password"),
    btn: document.querySelector("#new-password-btn"),
  };

  const repeatPassword = {
    input: document.querySelector("#repeat-password"),
    btn: document.querySelector("#repeat-password-btn"),
  };

  const arr = [currentPassword, newPassword, repeatPassword];
  arr.forEach((element) => {
    element.btn.addEventListener("click", () => {
      const inputType = element.input.getAttribute("type");
      if (inputType == "password") {
        element.btn.innerHTML = `<i class="fas fa-eye-slash">`;
        element.input.setAttribute("type", "text");
      } else {
        element.btn.innerHTML = `<i class="fas fa-eye">`;
        element.input.setAttribute("type", "password");
      }
    });
  });
};

const app = async () => {
  await fetchUser();
  render();
  hideAndShowPassword();
  handlePassword();
};

app();

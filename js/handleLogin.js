const preventDefaultLoginBtn = () => {
  const usernameInput = document.querySelector(".login-username");

  usernameInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
      e.preventDefault();
    }
  });
};

const ableToLogin = () => {
  const usernameInput = document.querySelector(".login-username");
  const passwordInput = document.querySelector(".login-password");
  const submitBtn = document.querySelector(".submit-btn");
  let toggleUsername = false;
  let togglePassword = false;

  //this thing change login-submit-btn to blue if both of username and password input are filled up
  usernameInput.addEventListener("input", () => {
    toggleUsername = usernameInput !== "" ? true : false;

    if (togglePassword && toggleUsername) {
      submitBtn.classList.add("submit-btn-active");
    } else {
      submitBtn.classList.remove("submit-btn-active");
    }
  });

  passwordInput.addEventListener("input", () => {
    togglePassword = passwordInput.value !== "" ? true : false;

    if (togglePassword && toggleUsername) {
      submitBtn.classList.add("submit-btn-active");
    } else {
      submitBtn.classList.remove("submit-btn-active");
    }
  });
};

const app = () => {
  ableToLogin();
  preventDefaultLoginBtn();
};
app();

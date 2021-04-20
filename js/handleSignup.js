const ableToTriggerSignupSubmitBtn = (arr) => {
  for (const item of arr) {
    if (item.isNotNull === false) {
      return false;
    }
  }
  return true;
};

const ableToSignUp = () => {
  const firstName = {
    selector: document.querySelector(".signup-first-name"),
    isNotNull: false,
  };
  const lastName = {
    selector: document.querySelector(".signup-last-name"),
    isNotNull: false,
  };
  const userName = {
    selector: document.querySelector(".signup-username"),
    isNotNull: false,
  };
  const email = {
    selector: document.querySelector(".signup-email"),
    isNotNull: false,
  };
  const password = {
    selector: document.querySelector(".signup-password"),
    isNotNull: false,
  };
  const passwordRepeat = {
    selector: document.querySelector(".signup-password-repeat"),
    isNotNull: false,
  };

  const submitBtn = document.querySelector(".submit-btn-signup");

  const selectors = [
    firstName,
    lastName,
    userName,
    email,
    password,
    passwordRepeat,
  ];

  selectors.forEach((item) => {
    item.selector.addEventListener("input", () => {
      item.isNotNull = item.selector.value !== "" ? true : false;
      if (ableToTriggerSignupSubmitBtn(selectors)) {
        submitBtn.classList.add("submit-btn-active");
      } else {
        submitBtn.classList.remove("submit-btn-active");
      }
    });
  });
};

const app = () => {
  ableToSignUp();
};
app();

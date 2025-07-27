// Transition Form
let loginFormState = true;

function collapse() {
  const login = document.getElementById("login-form");
  const register = document.getElementById("register-form");
  const formContainer = document.getElementById("form-container");
  const band = document.getElementById("form-band");

  function changeState() {
    return (loginFormState = !loginFormState);
  }

  if (loginFormState) {
    // formContainer.style.flexDirection = "column-reverse";
    formContainer.style.justifyContent = "space-around";
    login.style.display = "none";
    register.style.display = "block";
    register.style.marginTop = "4.7dvh";
    band.style.marginTop = "8.4dvh";
    changeState();
    return;
  }

  if (!loginFormState) {
    formContainer.style.flexDirection = "column";
    formContainer.style.justifyContent = "space-between";
    login.style.display = "block";
    register.style.display = "none";
    band.style.marginTop = "0";
    changeState();
    return;
  }
}

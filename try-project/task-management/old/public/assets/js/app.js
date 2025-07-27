// Transition Form
const loginFormState = true;
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
    register.style.marginTop = "0.9dvh";
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

document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".task-card");

  cards.forEach((card) => {
    card.addEventListener("click", function () {
      const details = this.querySelector(".task-details");
      if (details.style.display === "none") {
        details.style.display = "block";
      } else {
        details.style.display = "none";
      }
    });
  });
  // views/layout.php
  // mob-menu
  const menu = document.getElementById("mob-menu");
  const icoMenu = document.getElementById("icon-mob-menu");

  let animGrowShink = [
    {
      type: "menuGrow",
      width: "50dvw",
      height: "25dvh",
      animation: "0.2s forwards",
    },
    {
      type: "menuShrink",
      width: "12dvw",
      height: "5.5dvh",
      animation: "0.2s backwards",
    },
    {
      type: "inputGrow",
      width: "80dvw",
      height: "50dvh",
      animation: "0.2s forwards",
      bottom: "34dvh",
      right: "11dvw",
    },
    {
      type: "inputShrink",
      width: "12dvw",
      height: "5.5dvh",
      animation: "0.2s backwards",
      bottom: "12dvh",
      right: "5.5dvw",
    },
  ];
  let isShrunk = menu.style.width === animGrowShink[1].width;
  function getActiveState() {
    return isShrunk ? animGrowShink[1] : animGrowShink[0];
  }
  // Toggle size on click
  menu.addEventListener("click", function () {
    if (!isShrunk) {
      // Grow
      menu.style.width = animGrowShink[0].width;
      menu.style.height = animGrowShink[0].height;
      menu.style.transitionDuration = animGrowShink[0].animation;
      menu.style.cursor = "default";
      icoMenu.style.transition = "opacity 0s ease";
      icoMenu.style.opacity = 0;
      getActiveState();
    }
  });

  // Click outside to shrink
  document.addEventListener("click", function (event) {
    if (!menu.contains(event.target)) {
      menu.style.width = animGrowShink[1].width;
      menu.style.height = animGrowShink[1].height;
      menu.style.transitionDuration = animGrowShink[1].animation;
      menu.style.cursor = "pointer";
      icoMenu.style.transition = "opacity 1s ease";
      icoMenu.style.opacity = 1;
      getActiveState();
    }
  });

  // mob-input
  const input = document.getElementById("mob-input");
  const icoInput = document.getElementById("icon-mob-input");
  const form = document.getElementById("task-form");
  const formTitle = document.getElementById("task-form-title");

  let isInputShrunk = input.style.width === animGrowShink[3].width;
  let inputState = false;

  function getInputState() {
    return (inputState = !inputState);
  }

  function getActiveState() {
    return isInputShrunk ? animGrowShink[3] : animGrowShink[2];
  }

  input.addEventListener("click", function () {
    if (!inputState) {
      getInputState();
      icoInput.style.transition = "all 0.4s linear";
      icoInput.style.transform = "rotate(135deg)";
      form.style.transition = "all 0.2s ease-in";
      formTitle.style.transition = "all 0.2s ease-in";
      form.style.opacity = 1;
      form.style.visibility = "visible";
      formTitle.style.opacity = 1;
      formTitle.style.visibility = "visible";
    } else {
      getInputState();
      icoInput.style.transition = "all 0.4s linear";
      icoInput.style.transform = "rotate(0deg)";
      form.style.transition = "all 0.2s ease-out";
      formTitle.style.transition = "all 0.2s ease-out";
      form.style.opacity = 0;
      form.style.visibility = "hidden";
      formTitle.style.opacity = 0;
      formTitle.style.visibility = "hidden";
    }
  });
  // views/dashboard.php (User)
});

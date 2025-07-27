document.addEventListener("DOMContentLoaded", () => {
  function userToggle() {
    let dropdown = document.getElementById("dropdown");
    if (dropdown.classList.contains("show")) {
      dropdown.classList.remove("show");
      return;
    }
    dropdown.classList.toggle("show");
    console.log("ara");
  }

  document.getElementById("user").addEventListener("click", () => {
    userToggle();
  });
});

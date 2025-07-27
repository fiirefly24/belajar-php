document.querySelectorAll(".card").forEach((card) => {
  const header = card.querySelector(".card-header");
  const details = card.querySelector(".card-details");
  const btn = header.querySelector(".toggle-btn");

  header.addEventListener("click", () => {
    // Get all open cards EXCEPT this one
    const openCards = document.querySelectorAll(".card-details.open");

    // If this card is ALREADY open → just close it
    const isOpen = details.classList.contains("open");

    // Close all open cards
    openCards.forEach((openDetails) => {
      openDetails.classList.remove("open");
      const toggleBtn = openDetails
        .closest(".card")
        .querySelector(".toggle-btn");
      if (toggleBtn) toggleBtn.textContent = "+";
    });

    // If the clicked card was NOT open, open it
    if (!isOpen) {
      details.classList.add("open");
      if (btn) btn.textContent = "-";
    } else {
      // If it WAS open, we already closed it above
      if (btn) btn.textContent = "+";
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const manageIcon = document.querySelectorAll(".manageIcon");

  let inputState = false;

  function getInputState() {
    return (inputState = !inputState);
  }

  manageIcon.forEach((icon) => {
    icon.addEventListener("click", function () {
      if (!inputState) {
        icon.style.transition = "all 0.4s linear";
        icon.style.transform = "rotate(135deg)";
        getInputState();
      } else {
        icon.style.transition = "all 0.4s linear";
        icon.style.transform = "rotate(0deg)";
        getInputState();
      }
    });
  });
});

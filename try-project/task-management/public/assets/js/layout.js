document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.getElementById("user-toggle");
  const logout = document.getElementById("user-logout");

  toggle.addEventListener("click", () => {
    // Get all open cards EXCEPT this one
    const openCards = document.querySelector(".user-logout");

    // If this card is ALREADY open → just close it
    const isOpen = openCards.classList.contains("open");

    // Close all open cards
    openCards.classList.remove("open");

    // If the clicked card was NOT open, open it
    if (!isOpen) {
      openCards.classList.add("open");
    } else {
      // If it WAS open, we already closed it above
    }
  });
});

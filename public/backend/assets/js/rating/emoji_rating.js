// Emoji
(function () {
  document.querySelectorAll(".feedback li").forEach((entry) =>
    entry.addEventListener("click", (e) => {
      if (!entry.classList.contains("active")) {
        document
          .querySelector(".feedback li.active")
          .classList.remove("active");
        entry.classList.add("active");
      }
      e.preventDefault();
    })
  );
})();

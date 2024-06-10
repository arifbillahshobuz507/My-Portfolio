/*=====================
        Copy html prism
    ==========================*/
(function () {
  const copy_btn = document.querySelectorAll(".copy-btn");
  const card_copy_header = document.querySelector(".card-copy-header");

  copy_btn.forEach((item) => {
    console.log(item);
    item.addEventListener("click", function (e) {
      const cardEl = item.closest(".card");
      const codeEl = cardEl.querySelector(".card-copy-content");
      const previewEl = cardEl.querySelector(".preview");
      const preview_avatarEl = cardEl.querySelector(".preview-none");

      codeEl.classList.toggle("show");
      previewEl.classList.toggle("show");
      preview_avatarEl.classList.toggle("remove");
    });
  });
})();

/*=====================
    Copy Js
==========================*/

// Copy Function
function copyFunction() {
  const BtnParentEl =
    this.closest(".copyparent").querySelector("pre").textContent;

  navigator.clipboard.writeText(BtnParentEl);
  this.innerHTML = `<svg
      xmlns="http://www.w3.org/2000/svg"
      width="20"
      height="20"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      class="feather feather-check-square"
    >
      <polyline points="9 11 12 14 22 4"></polyline>
      <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
    </svg>`;
  setTimeout(() => {
    this.innerHTML = `<svg
    xmlns="http://www.w3.org/2000/svg"
    width="20"
    height="20"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
    class="feather feather-clipboard"
  >
    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
  </svg>`;
  }, 1500);
}

const copybtn = document.querySelectorAll(".copybtn");
copybtn?.forEach((copybtn) => {
  copybtn.addEventListener("click", copyFunction);
});

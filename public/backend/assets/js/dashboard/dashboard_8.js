(function () {
  // Swiper Slider
  const category_swiper3 = new Swiper(".shop-category-slider", {
    slidesPerView: 9,
    spaceBetween: 5,
    loop: true,
    autoplay: {
      delay: 2000,
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
        spaceBetween: 12,
      },
      400: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      500: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 5,
        spaceBetween: 20,
      },
      1100: {
        slidesPerView: 6,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 12,
      },

      1235: {
        slidesPerView: 5,
        spaceBetween: 12,
      },
      1400: {
        slidesPerView: 6,
      },
      1530: {
        slidesPerView: 7,
      },
      1890: {
        slidesPerView: 9,
        spaceBetween: 5,
      },
    },
  });

  // Order Details Trash Removes
  function CheckProductQuantity() {
    let AllProducts = document.getElementsByClassName("order-details-wrapper");
    let HiddenProducts = document.getElementsByClassName("product-remove");
    if (AllProducts.length == HiddenProducts.length) {
      document.querySelector(".empty-card").classList.add("show");
    }
  }
  const product_details = document.getElementsByClassName(
    "order-details-wrapper"
  );
  product_details.forEach((item, index) => {
    let DeleteButton = item.querySelector(".trash-remove");
    DeleteButton.addEventListener("click", (event) => {
      item.classList.add("product-remove");
      CheckProductQuantity();
    });
  });

  // Our Product Quantity Counts
  let add_quantity = document.querySelectorAll(".add-quantity");
  console.log("add_quantity", add_quantity);
  add_quantity.forEach((item) => {
    var productCounter = {
      count: 0,
      incrementCounter: function () {
        if (this.count < 10) {
          return (this.count = this.count + 1);
        } else {
          console.log("limit 10");
          return this.count;
        }
      },
      decrementCounter: function () {
        if (this.count > 0) {
          return (this.count = this.count - 1);
        } else {
          return (this.count = 0);
        }
      },
    };
    var displayCount = item.querySelector(".countdown-remove");

    item.querySelector(".count-increase").onclick = function () {
      displayCount.value = productCounter.incrementCounter();
      item.querySelector(".add-btn").style.display = "none";
      item.querySelector(".remove-minus").style.display = "block";
      item.querySelector(".countdown-remove").style.display = "block";
    };

    item.querySelector(".remove-minus").onclick = function () {
      displayCount.value = productCounter.decrementCounter();
      var counter = productCounter.count;
      if (counter == 0) {
        item.querySelector(".remove-minus").style.display = "none";
        item.querySelector(".countdown-remove").style.display = "none";
        item.querySelector(".add-btn").style.display = "block";
      }
    };

    item.querySelector(".add-btn").onclick = function () {
      displayCount.value = productCounter.incrementCounter();
      item.querySelector(".add-btn").style.display = "none";
      item.querySelector(".remove-minus").style.display = "block";
      item.querySelector(".countdown-remove").style.display = "block";
    };
  });
})();

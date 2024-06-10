// touchspin with addEventListener
let getInputByClass = document.getElementsByClassName("input-touchspin");

(function () {
  Array.from(getInputByClass).forEach((elem, i) => {
    let inputData = elem.getAttribute("value");

    let isIncrement = elem.parentNode.querySelectorAll(".increment-touchspin");
    let isDecrement = elem.parentNode.querySelectorAll(".decrement-touchspin");
    if (isIncrement) {
      isIncrement[0].addEventListener("click", () => {
        inputData++;
        elem.setAttribute("value", inputData);
      });
    }
    if (isDecrement) {
      isDecrement[0].addEventListener("click", () => {
        if (inputData > 0) {
          inputData--;
          elem.setAttribute("value", inputData);
        }
      });
    }
  });
})();

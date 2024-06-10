// Custom input search
var result = document.querySelector(".results");
var Arr = [
  "HTML",
  "CSS",
  "PHP",
  "Javascript",
  "Dart",
  "Python",
  "Swift",
  "Java",
  "C++",
  "Go",
  "SASS",
  "C#",
  "LESS",
  "Kotlin",
  "Q#",
  "Xray",
  "Zero",
  "Perl",
  "Ruby",
];

// auto complete function
function autoComplete(Arr, Input) {
  return Arr.filter((e) => e.toLowerCase().includes(Input.toLowerCase()));
}

function getValue(val) {
  // if no value
  if (!val) {
    result.innerHTML = "";
    return;
  }

  // search goes here
  var data = autoComplete(Arr, val);

  // append list data
  var res = "<ul>";
  data.forEach((e) => {
    res += "<li>" + e + "</li>";
  });
  res += "</ul>";
  result.innerHTML = res;
}

// Custom add search option
const selected = document.querySelector(".selected-box");
const optionsContainer = document.querySelector(".options-container");
const searchBox = document.querySelector(".search-box input");

const optionsList = document.querySelectorAll(".selection-option");

selected.addEventListener("click", () => {
  console.log("optionsContainer", optionsContainer);
  optionsContainer.classList.toggle("active");

  searchBox.value = "";
  filterList("");

  if (optionsContainer.classList.contains("active")) {
    searchBox.focus();
  }
});

optionsList.forEach((o) => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

searchBox.addEventListener("keyup", function (e) {
  filterList(e.target.value);
});

const filterList = (searchTerm) => {
  searchTerm = searchTerm.toLowerCase();
  optionsList.forEach((option) => {
    let label =
      option.firstElementChild.nextElementSibling.innerText.toLowerCase();
    if (label.indexOf(searchTerm) != -1) {
      option.style.display = "block";
    } else {
      option.style.display = "none";
    }
  });
};

let nextButton = document.getElementById("nextButton");
let selected = document.querySelectorAll(".form-check-input");

let choose;
selected.forEach((element) => {
  element.addEventListener("change", (e) => {
    nextButton.classList.remove("chooseNone");
    choose = e.target.value;
  });
});

nextButton.addEventListener("click", () => {
  if (choose === "signup-user") {
    location.href = "../pages/signup-user.html";
  } else if (choose === "signup-partner") {
    location.href = "../pages/signup-partner.html";
  }else if(choose === "signup-delivery") {
    location.href = "../pages/signup-delivery.html";
  }
});

console.log(choose);

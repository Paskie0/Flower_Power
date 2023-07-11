const themeSwitcher = document.querySelector("#theme-switcher");
const currentTheme = localStorage.getItem("theme") || "halloween";
document.documentElement.setAttribute("data-theme", currentTheme);
themeSwitcher.checked = currentTheme === "retro";
themeSwitcher.addEventListener("change", function () {
  const newTheme = themeSwitcher.checked ? "retro" : "halloween";
  document.documentElement.setAttribute("data-theme", newTheme);
  localStorage.setItem("theme", newTheme);
});

function toggleForms() {
  const login = document.querySelector("#login");
  const register = document.querySelector("#register");
  const toggleFormsButton = document.querySelector("#toggleFormsButton");
  login.classList.toggle("hidden");
  register.classList.toggle("hidden");
  if (login.classList.contains("hidden")) {
    toggleFormsButton.innerHTML = "Login";
  } else {
    toggleFormsButton.innerHTML = "Registreren";
  }
}

function medewerkerForm() {
  const medewerkerLogin = document.querySelector("#medewerker-login");
  const login = document.querySelector("#login");
  const medewerkerFormButton = document.querySelector("#medewerkerFormButton");
  medewerkerLogin.classList.toggle("hidden");
  login.classList.toggle("hidden");
  medewerkerFormButton.classList.toggle("btn-primary");
}

const themeSwitcher = document.querySelector("#theme-switcher");
themeSwitcher.addEventListener("change", function () {
  document.documentElement.setAttribute("data-theme", themeSwitcher.checked ? "retro" : "halloween");
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

const themeSwitcher = document.querySelector("#theme-switcher");
themeSwitcher.addEventListener("change", () => {
  document.documentElement.setAttribute("data-theme", themeSwitcher.checked ? "retro" : "halloween");
  localStorage.setItem("data-theme", document.documentElement.getAttribute("data-theme"));
});

function toggleForms() {
  document.querySelector("#login").classList.toggle("hidden");
  document.querySelector("#register").classList.toggle("hidden");
  if (document.querySelector("#login").classList.contains("hidden"))
    document.querySelector("#toggleFormsButton").innerHTML = "Login";
  else document.querySelector("#toggleFormsButton").innerHTML = "Registreren";
}

function medewerkerForm() {
  document.querySelector("#medewerker-login").classList.toggle("hidden");
  document.querySelector("#login").classList.toggle("hidden");
  document.querySelector("#medewerkerFormButton").classList.toggle("btn-primary");
}

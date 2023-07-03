const themeSwitcher = document.querySelector("#theme-switcher");
themeSwitcher.addEventListener("change", () => {
  document.documentElement.setAttribute("data-theme", themeSwitcher.checked ? "retro" : "halloween");
});

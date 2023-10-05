// Global Constants
const LOCAL_STORAGE_PREFIX = 'ARCHIVEREADER'
const LOCAL_STORAGE_THEME = `${LOCAL_STORAGE_PREFIX}-THEME`
const themeToggleInput = document.querySelector('[data-theme-toggle]')


window.addEventListener("load", e => {
  loadThemePrefs()
})

themeToggleInput.addEventListener('change', event => {
  let theme = event.target.checked ? 'dark' : 'light'
  document.documentElement.setAttribute('data-theme', theme)
  localStorage.setItem(LOCAL_STORAGE_THEME, theme);
});

function loadThemePrefs() {
  let theme = localStorage.getItem(LOCAL_STORAGE_THEME);
  if (theme) {
    document.documentElement.setAttribute('data-theme', theme);
    theme === 'dark' ? themeToggleInput.checked = true : themeToggleInput.checked = false;
  } else {
    document.documentElement.setAttribute('data-theme', 'dark');
    themeToggleInput.checked = true;
    localStorage.setItem(LOCAL_STORAGE_THEME, 'dark');
  }
}
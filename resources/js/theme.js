const LOCAL_STORAGE_PREFIX = 'ARCHIVEREADER'
const LOCAL_STORAGE_THEME = `${LOCAL_STORAGE_PREFIX}-THEME`
const themeToggleInput = document.querySelector('[data-theme-toggle]')

loadThemePrefs()

themeToggleInput.addEventListener('change', event => {
  let theme = event.target.checked ? 'light' : 'dark'
  setTheme(theme)
})

function setTheme(theme) {
  document.documentElement.setAttribute('data-theme', theme)
  localStorage.setItem(LOCAL_STORAGE_THEME, theme)
  theme === 'dark' ? themeToggleInput.checked = false : themeToggleInput.checked = true
}

function loadThemePrefs() {
  let theme = localStorage.getItem(LOCAL_STORAGE_THEME) || 'dark'
  setTheme(theme)
}
let bookID, volumeID, chapterID, xReader, xReaderState;

// urlHash = { fetchChapter: "route('fetch.chapter')" }
xReader = document.querySelector('#readerMain');
xReaderState = document.querySelector("#readerData").dataset.readerState;
bookID = document.querySelector("#readerData").dataset.book;
chapterID = document.querySelector("#readerData").dataset.currentChapter;
let readerWidthRadios = document.querySelectorAll('input[type=radio][name="readerWidth"]');
let readerModeCheck = document.querySelector('input[type=checkbox]#readerMode');
let readerThemeCheck = document.querySelector('input[type=checkbox]#readerTheme');

// Window Load
window.addEventListener("load", (event) => {
  let dataHash = { book_id: bookID, chapter_id: chapterID };
  fetchChapter(urlHash.fetchChapter, dataHash);
  loadUserPreferences();
});

// Chapter Pagination|Links
document.addEventListener('click', function (event) {
	if (!event.target.matches('.readerNavLink, .readerPageLink')) return;
  event.preventDefault();
  changeChapter(event);
});

// Show|Hide Sidebar on Desktop
document.querySelector('#readerSidebarToggle').addEventListener('click', event => {
  event.preventDefault();
  document.querySelector('body').classList.toggle('sidebar-closed');
});

readerWidthRadios.forEach(radio => radio.addEventListener('change', function() {
    xReader.dataset.readerWidth = radio.value;
    localStorage.setItem('readerWidth', radio.value);
  }
));

readerModeCheck.addEventListener('change', event => {
  let modeName = event.target.checked ? 'infinite' : 'page';
  xReader.dataset.readerMode = modeName;
  localStorage.setItem('readerMode', modeName);
});

readerThemeCheck.addEventListener('change', event => {
  let themeName = event.target.checked ? 'dark' : 'light';
  document.documentElement.setAttribute('theme', themeName)
  // document.body.classList.remove(event.target.checked ? 'light' : 'dark');
  // document.body.classList.add(themeName);
  localStorage.setItem('readerTheme', themeName);
});


function changeChapter(event) {
  let dataHash = {
    chapter_id: event.target.dataset.chapter,
    book_id: bookID,
  };
  setCurrentChapter(event.target.dataset.chapter);
  fetchChapter(urlHash.fetchChapter, dataHash);
}

function setCurrentChapter(chapterId) {
  document.querySelector("#readerData").dataset.currentChapter = chapterId;
  if (document.querySelector(".readerNavLink.active")) {
    document.querySelector(".readerNavLink.active").classList.remove('active');
  }
  if (document.querySelector(".readerNavLink[data-chapter='"+chapterId+"']")) {
    document.querySelector(".readerNavLink[data-chapter='"+chapterId+"']").classList.add('active');
  }
}

function fetchChapter(url, data) {

  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.value
    }
  })
  .then(response => response.json())
  .then(function(response) {
    if (response.status >= 200 && response.status <= 299) {
      xReader.innerHTML = response.html;
      let navHeight = document.querySelector('.header.header--global') ? document.querySelector('.header.header--global').offsetHeight : 0;
      window.scrollTo(0, navHeight);
    } else if (response.message.includes('CSRF token mismatch')) {
      window.location.reload();
    }
  });
}

function loadUserPreferences() {
  if (localStorage.readerWidth) {
    readerWidthRadios.forEach(radio => {
      if (radio.value == localStorage.readerWidth) {
        radio.checked = true;
        xReader.dataset.readerWidth = localStorage.readerWidth;
      }
    });
  }
  if (localStorage.readerMode) {
    localStorage.readerMode == 'infinite' ? readerModeCheck.checked = true : readerModeCheck.checked = false;
    xReader.dataset.readerMode = localStorage.readerMode;
  }
  if (localStorage.readerTheme) {
    localStorage.readerTheme == 'dark' ? readerThemeCheck.checked = true : readerThemeCheck.checked = false;
  }
}
<nav id="readerNav" class="header header--sticky py-2">
  <div class="d-flex align-content-center justify-content-between px-4">
    <div>
      <button class="header--button mobile button button--icon button--outline-secondary button--round p-2"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#readerSidebar"
              aria-controls="offcanvasNavbar">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 12H9m12-6H9m12 12H9m-4-6a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0-6a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button id="readerSidebarToggle" class="header--button desktop button button--icon button--outline-secondary button--round p-2" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 12H9m12-6H9m12 12H9m-4-6a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0-6a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </div>
    <hgroup>
      <h1>{!! $book->title !!}</h1>
    </hgroup>
    <div>
      <button class="header--button button button--icon button--outline-secondary button--round p-2"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#readerSettings"
              aria-controls="offcanvasNavbar">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8h12m0 0a3 3 0 1 0 6 0 3 3 0 0 0-6 0Zm-6 8h12M9 16a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>

      <aside id="readerSettings" class="offcanvas offcanvas-dynamic">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title">Reader Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#viewerSidebar"></button>
        </div>
        <div class="offcanvas-body">
          @include('books.reader.settingsMenu')
        </div>
      </aside>
    </div>
  </div>
</nav>

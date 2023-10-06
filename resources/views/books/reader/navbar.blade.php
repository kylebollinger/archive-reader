<header id="readerNav" class="header header--reader header--sticky">
  <nav class="container-xxl">
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
    <div class="faux-button"></div>
  </nav>
</header>
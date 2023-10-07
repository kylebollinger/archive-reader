<header class="header header--global sticky-top">
  <nav class="container-xxl" aria-label="Main navigation">
    <a class="logo" href="/" aria-label="Archive Reader">
      @include('partials.logo')
    </a>

    <div class="switch switch--theme">
      <input type="checkbox" id="theme" data-theme-toggle>
      <label for="theme">
        @include('partials.icons.sun')
        @include('partials.icons.moon')
        <div class="switch--ball"></div>
      </label>
    </div>
  </nav>
</header>

<script type="text/javascript" src="{{url('/dist/js/theme.js')}}"></script>
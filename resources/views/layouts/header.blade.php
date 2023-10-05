<header class="header header--global sticky-top">
  <nav class="container-xxl" aria-label="Main navigation">
    <a class="logo" href="/" aria-label="Archive Reader">
      @include('partials.logo')
    </a>
    <div class="switch input-group">
      <div class="form-check form-switch switch-wrap">
        <input class="form-check-input" type="checkbox" id="theme-toggle" data-theme-toggle>
      </div>
    </div>
  </nav>
</header>

<script type="text/javascript" src="{{url('/dist/js/theme.js')}}"></script>
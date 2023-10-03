<div class="search" data-search-container>
  <form method="GET" action="{{ route('search') }}" class="d-flex flex-grow-1 explore-search">
    <input  type="text" class="flex-grow-1" name="keyword"
            placeholder="Find books, categories and topics"
            value="{{ isset($request['keyword']) ? $request['keyword'] : '' }}"
            data-search-input>
    <button type="button" class="cancel" data-close-search-btn></button>
  </form>
</div>

<script type="text/javascript">
  document.querySelector('[data-search-input]').addEventListener('focus', event => {
    document.querySelector('[data-search-container]').classList.toggle("focus");
  });

  document.querySelector('[data-close-search-btn]').addEventListener('click', event => {
    event.preventDefault();
    document.querySelector('[data-search-input]').value = "";
    document.querySelector('[data-search-container]').classList.toggle("focus");
  });
</script>
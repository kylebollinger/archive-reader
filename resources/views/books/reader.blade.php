@extends('base')
@section("title", isset($book->title) ? $book->title : "Book")

@push('body-class', 'reader')
@push('head_scripts')
<script src="{{ asset('dist/js/reader.js') }}" defer></script>
<script>
let urlHash = {
  fetchChapter: "{{ route('fetch.chapter') }}",
}
if (localStorage.readerTheme) document.documentElement.setAttribute('theme', localStorage.readerTheme);
</script>
@endpush

@section('content')

@include('books.reader.navbar')

<div id="readerWrap" class="container-fluid">
  <aside id="readerSidebar" class="offcanvas offcanvas-bottom">
    @include('books.reader.sidebar', ['book' => $book, 'contents' => $contents, 'current_chapter' => $current_chapter])
  </aside>

  <section id="readerMain" data-reader-width="default" data-reader-mode="page">
    @include('partials.spinner')
  </section>

  <section id="readerEnd">
    <span id="readerData"
          data-book="{{ $book->uuid }}"
          data-current-chapter="{{ $current_chapter->id }}"
          data-reader-state=""
          ></span>
  </section>
</div>


@stop
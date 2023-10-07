@extends('base')

@section('content')

<section class="hero">
  <div class="hero--inner" style="background: url({{env('CLOUDFRONT_CDN_URL') . "g/img/ancient-texts-hero.webp"}}) no-repeat center / cover;">
    <div class="container-xxl px-4">
      <hgroup class="text-center text-white mb-4">
        <h1 class="fs-1 fw-700 mb-1">Ancient Texts Archive</h1>
        <h2 class="fs-5 fw-500 mb-0">Exploring the sacred treasures of the past</h2>
      </hgroup>
      <div class="content">
        @include('books.partials.search')
      </div>
    </div>
  </div>
</section>

<section class="page explore">
  <div class="container-xxl">
    <section class="list">
      <h2 class="list-title">Top Categories</h2>
      <div class="grid-container categories-grid">
        @foreach ($categories as $category)
          @include('books.partials.category')
        @endforeach
      </div>
    </section>

    <section class="list">
      <h2 class="list-title">Featured Books</h2>
      <div class="grid-container books-grid">
        @foreach ($books as $book)
          @include('books.partials.book')
        @endforeach
      </div>
    </section>

    <section class="list">
      <h2 class="list-title">Catalog: A-Z</h2>
      <div class="grid-container alphabetical-grid">
        @foreach ($abc_indicies as $abc_index)
          <div class="grid-item category-link">
            <a href="{{ route('books.alphabetical.index', ['letter' => $abc_index]) }}"
                class="button button--secondary button--xl">{{ $abc_index }}</a>
          </div>
        @endforeach
      </div>
    </section>
  </div>
</section>

@stop
@extends('base')

@section('content')

<section class="page">
  <div class="container">
    <section class="list">
      <h2 class="list-title">Category: {!! $category->name !!}</h2>
      <div class="grid-container books-grid">
        @foreach ($books as $book)
          @include('books.partials.book')
        @endforeach
      </div>
    </section>
    <div class="col-md-12">
      {{ $books->links('vendor.pagination.default') }}
    </div>
  </div>
</section>

@stop
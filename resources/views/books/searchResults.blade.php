@extends('base')

@section('content')


<section class="page explore">
<div class="container-fluid">
    <section>
        @include('books.partials.search')
        <h6 class="text-center mt-2">{{ count($results) }} {{ Str::plural('result', count($results)) }} found</h6>
    </section>

    @forelse($results->groupByType() as $type => $results)
    @php
        $result_title = $type == 'books' ? "Book" : "Category";
        $result_title = Str::plural($result_title, count($results));
    @endphp
    <section class="list">
        <h2 class="list-title">{{ $result_title }}</h2>
        <div class="grid-container">
        @foreach($results as $searchResult)
            @if ($type == 'books')
            @include('books.partials.book', ['book' => $searchResult->searchable])
            @elseif ($type == 'book_categories')
            @include('books.partials.category', ['category' => $searchResult->searchable])
            @endif
        @endforeach
        </div>
    </section>
    @empty
    <div class="col-md-12">
        <div class="placeholder--content">
        <div class="placeholder--icon"><img src="{{ url('images/book-icon.svg') }}"></div>
            <h4 class="placeholder--message">It looks like we can't find anything matching your search</h4>
            <div class="placeholder--action-bar">
            <a class="button button--light-purple button--sm" href="{{ route('books') }}">Explore all Sacred Texts</a>
        </div>
        </div>
    </div>
    @endforelse
</div>
</section>

@stop
<div class="grid-item grid-item--book">
  <div class="inner-wrap book">
    <a class="stretch-link" href="{{ route('books.reader', $book->slug) }}"></a>
    @if ($book->cover_art())
      <figure class="cover-art" style='background-image: url("{{$book->cover_art()}}")'></figure>
    @else
      <figure class="cover-art placeholder-book"><svg viewBox="0 0 32 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28 0H4a4 4 0 0 0-4 4v28a4 4 0 0 0 4 4h24a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4Z" fill="#CDD5DF"/><path d="M9 7h14M9 13h8M9 19h12" stroke="#9AA4B2" stroke-width="2" stroke-linecap="round"/><path d="M0 32a4 4 0 0 1 4-4h22c1.9 0 2.8 0 3.5-.3a4 4 0 0 0 2.2-2.2c.3-.7.3-1.6.3-3.5v6c0 3.8 0 5.7-1.2 6.8-1.1 1.2-3 1.2-6.8 1.2H4a4 4 0 0 1-4-4Z" fill="#9AA4B2"/></svg></figure>
    @endif
    <h6 class="title" title="{!! $book->title !!}">{!! $book->title !!}</h6>
    <p class="author mb-1">{!! $book->author !!}</p>
    <p class="year my-0">{{ $book->date() }}</p>
  </div>
</div>
@if ($chapter)
@php
$current_index = $chapter->book_sequence;
$prev_item = $chapter->book->chapter_at_index($current_index -1);
$next_item = $chapter->book->chapter_at_index($current_index +1);
@endphp
  <article id="readerContent" class="reader--content"
            data-chapter="{{ $chapter->id }}"
            data-volume="{{ $chapter->volume_id }}"
            data-index="{{ $chapter->book_sequence }}">
            {!! $chapter->body !!}
  </article>
  <div class="reader--pagination mt-4">
    <div>
      <button class="readerPageLink prev button button--xl button--icon"
              data-chapter="{{ $prev_item->id }}"
              data-volume="{{ $prev_item->volume_id }}"
              data-index="{{ $prev_item->book_sequence }}">
              <span class="fw-700 fs-5 ta-left">Prev</span>
              <span class="fw-500 fs-7 ta-left">{{ $prev_item->title }}</span>
      </button>
    </div>
    <div>
      <button class="readerPageLink next button button--xl button--icon"
              data-chapter="{{ $next_item->id }}"
              data-volume="{{ $next_item->volume_id }}"
              data-index="{{ $next_item->book_sequence }}">
              <span class="fw-700 fs-5 ta-right">Next</span>
              <span class="fw-500 fs-7 ta-right">{{ $next_item->title }}</span>
      </button>
    </div>
  </div>
@endif
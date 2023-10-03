<nav class="sidebar--wrap">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Table of Contents</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#viewerSidebar"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="list-unstyled">
      @foreach ($contents as $volume)
        <li class="expander mb-1">
          @php $collapse_class = in_array($current_chapter->id, $volume->chapters->pluck('id')->toArray()) ? "show" : null; @endphp
          <button class="expander--button"
                  data-bs-toggle="collapse"
                  data-bs-target="#volume-{{ $loop->index }}"
                  aria-expanded="{{ $collapse_class ? "true" : "false" }}"
                  aria-current="true"
                  >{!! $volume->title !!}</button>
          <div class="collapse {{ $collapse_class }}" id="volume-{{ $loop->index }}">
            <ul class="list-unstyled">
              @foreach ($volume->chapters as $chapter)
              @php $active_class = $current_chapter->id == $chapter->id ? "active" : null; @endphp
                <li>
                  <a class="readerNavLink expander--link py-2 {{ $active_class }}" href="#"
                    data-chapter="{{ $chapter->id }}"
                    data-volume="{{ $chapter->volume_id }}"
                    data-index="{{ $chapter->book_sequence }}"
                    data-bs-dismiss="offcanvas"
                    >{!! $chapter->title !!}</a>
                </li>
              @endforeach
            </ul>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</nav>